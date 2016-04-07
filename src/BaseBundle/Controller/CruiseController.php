<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BaseBundle\Controller\Helper as Helper;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\Query\ResultSetMapping;

class CruiseController extends Controller
{
    /**
	 * @Template()
	 * @Route("/cruise", name="cruise" )
     */		
	public function indexAction()
	{
		return array("months"=>$this->months());
	}


	public function searchCruise($parameters = array())
	{
		print_r($parameters);
		$em = $this->getDoctrine()->getManager();
		$rsm = new ResultSetMapping;
		$rsm->addEntityResult('BaseBundle:CruiseCruise', 'c');
		$rsm->addFieldResult('c', 'c_id', 'id');
		$rsm->addMetaResult('c', 'c_ship', 'ship');
		$rsm->addFieldResult('c', 'c_startdate', 'startdate');
		$rsm->addFieldResult('c', 'c_enddate', 'enddate');
		$rsm->addFieldResult('c', 'c_daycount', 'daycount');
		$rsm->addFieldResult('c', 'c_description', 'description');
		$rsm->addFieldResult('c', 'c_route', 'route');
		$rsm->addMetaResult('c', 'c_code', 'code');
		$rsm->addJoinedEntityResult('BaseBundle:CruiseShip', 's','c', 'ship');
		$rsm->addFieldResult('s', 's_id', 'id');
		$rsm->addFieldResult('s', 's_title', 'title');
		$rsm->addFieldResult('s', 's_code', 'code');
		$rsm->addFieldResult('s', 's_m_id', 'motorship_id');
		$rsm->addFieldResult('s', 's_img', 'imgurl');
		$rsm->addJoinedEntityResult('BaseBundle:CruiseShipCabinCruisePrice', 'p','c', 'prices');
		$rsm->addFieldResult('p', 'p_id', 'id');
		$rsm->addFieldResult('p', 'p_price', 'price');
		$rsm->addJoinedEntityResult('BaseBundle:CruiseCruiseSpec', 'code','c', 'code');		
		$rsm->addFieldResult('code', 'code_code', 'code');
		$rsm->addFieldResult('code', 'code_so', 'specialOffer');
		$rsm->addFieldResult('code', 'code_bc', 'burningCruise');
		$rsm->addFieldResult('code', 'code_rp', 'reductionPrice');

		
		$where = "";
		
		if(isset($parameters['startDate']))
		{
			$where .= "
			AND c.startdate >= ".strtotime($parameters['startDate']);
		}		
		if(isset($parameters['endDate']))
		{
			$where .= "
			AND c.enddate <= ".strtotime($parameters['endDate']);
		}
		if(isset($parameters['ship']) && ($parameters['ship'] > 0) )
		{
			$where .= "
			AND s.id = ".$parameters['ship'];
		}
		if(isset($parameters['specialoffer']))
		{
			$where .= "
			AND code.specialOffer = 1";			
		}
		if(isset($parameters['burningCruise']))
		{
			$where .= "
			AND code.burningCruise = 1";			
		}	
		if(isset($parameters['reductionPrice']))
		{
			$where .= "
			AND code.reductionPrice = 1";			
		}
		if(isset($parameters['days']))
		{
			list($mindays,$maxdays) = explode(',',$parameters['days']);
			$where .= "
			AND c.daycount >=".$mindays;
			$where .= "
			AND c.daycount <=".$maxdays;			
		}			
		
		$sql = "
		SELECT 
			c.id c_id , c.ship_id c_ship, c.startDate c_startdate, c.endDate c_enddate, c.dayCount c_daycount, c.description c_description, c.route c_route, c.code c_code
			,
			s.id s_id, s.title s_title, s.code s_code, s.motorship_id s_m_id , s.imgUrl s_img
			,
			p.id p_id, p.price p_price
			,
			code.code code_code, code.specialOffer code_so, code.burningCruise code_bc, code.reductionPrice code_rp
		FROM cruise_cruise c
		LEFT JOIN cruise_ship s ON c.ship_id = s.id
		LEFT JOIN 
		
			(
				SELECT p2.id , MIN(p2.price) price, p2.cruise_id
				FROM cruise_ship_cabin_cruise_price p2
				WHERE p2.tariff_id = 1
				GROUP BY p2.cruise_id
				
			) p ON c.id = p.cruise_id
		
		
		LEFT JOIN cruise_cruise_spec code ON c.code = code.code
		WHERE 1
		"
		.$where.
		"
		ORDER BY c.startdate
		";
		
		$query = $em->createNativeQuery($sql, $rsm);
		
		
		//$query->setParameter(1, 'romanb');
		
		$result = $query->getResult();
		return $result;
	}

	
    /**
	 * @Template()
     */		
	public function shipAction($ship)
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:Document');
		$url = "/cruise/ship/".$ship;
		$doc = $repository->findOneByUrl($url);
		if ($doc == null) {
			throw $this->createNotFoundException("Страница не найдена.");
		}
		
		// теплоход 
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
		$sh = $repository->findOneByCode($ship);
		
		// добавить фотоальбом
/*
		$qb = $this->getDoctrine()->getRepository("BaseBundle:CruiseCruise")->createQueryBuilder("c");
		$qb->select('c','s','p');
		$qb->innerJoin('c.ship','s');
		$qb->leftJoin('c.prices','p');
		$qb->leftJoin('p.tariff','tariff');
		$qb->andWhere("tariff.id = 1");
		
		
		$qb->andWhere("s.code = ?1");
		$qb->setParameter(1, $ship);			
		
		$qb->orderBy("c.startdate");

		$result = $qb->getQuery()->getResult();*/
		$result = $this->searchCruise(array('ship'=>$sh->getId()));
		$result = new ArrayCollection($result);
		$result = $this->monthsSchedule($result);
		
		return array("document" => $doc,'cruises_months' => $result, 'ship' => $sh); 
	}
	
	# выводит список ссылок на месяцы
	private function months() {
		$months = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findMonths();
		$result = array();
		$current = "";
		foreach ($months as $month) {
			$date = date('M Y', $month['startdate']);
		if ($date == $current) continue;
			$model = new \stdClass();
			$model->title = Helper\Convert::month_ru($month['startdate']);
			$model->url = $this->generateUrl("month_cruises", array("month" => strtotime($date)));
			$result[] = $model;
			$current = $date;
		}
		$model = new \stdClass();
		$model->title = "Все круизы";
		$model->url = $this->generateUrl("monthschedule");
		$result[] = $model;
		return $result;
	}

	/**
	* @Template()
	*/
	public function monthMenuAction() 
	{
		
		return array('monthMenu'=>$this->months());
	}
	
	
    /**
	 * @Template()     
	 */	
	# выводит список круизов на конкретный месяц
	public function monthAction($month) {
		$cruises = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findForMonth($month);
		$title = Helper\Convert::month_ru($month);
		foreach ($cruises as $cruise) {
			$wrap = Helper\PrepareCruiseRow::prepare($cruise);
			$result[] = $wrap;
			//$result[] = $cruises;
		}
		return  array("cruises" => $result, "title" => $title);
	}

    /**
	 * @Template()
	 */	
	# список всех круизов по месяцам
	public function scheduleAction()
	{
		$cruises = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findAllOrdered();
		$result = $this->monthsSchedule($cruises);
		return array('cruises_months' => $result);
	}

	private function monthsSchedule($cruises) {
		$currentMonth = null;
		$result = array();
		foreach ($cruises as &$cruise) {
			$startDate = $cruise->getStartdate();
			$month = date("M Y", $startDate);
			if ($month != $currentMonth) {
				$group = new \stdClass();
				$group->name = Helper\Convert::month_ru($startDate);
				$result[] = $group;
				$currentMonth = $month;
			}
			$wrap = Helper\PrepareCruiseRow::prepare($cruise);
			$group->row[] = $wrap;
		}
		return $result;
	}	

    /**
	 * @Template()
	
	 */		
	public function detailsAction($url)
	{
		//нужно разбить на несколько запросов для оптимизации
		
		
		$cruise = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findByUrl(Helper\CruiseUrl::parse($url));
		
		$cruiseShipPrice = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findByUrlPrice(Helper\CruiseUrl::parse($url));
		
		$dump = $cabinsAll = $cruiseShipPrice->getShip()->getCabins();
		foreach($cabinsAll as $cabinsItem)
		{
			foreach($cabinsItem->getPrices() as $prices)
			{
				$price[$prices->getRpId()->getRpName()]['prices'][$prices->getTariff()->getname()] = $prices;
				$price[$prices->getRpId()->getRpName()]['rooms'] = $cabinsItem->getRooms();//список кают
				// сюда добавить свободные каюты
				//$rooms => 				
			}
			$cabins[$cabinsItem->getDeckId()->getName()][] = array(
				'deckName' =>$cabinsItem->getRtId()->getRtComment(),
				'cabin' => $cabinsItem,
				'rpPrices' => $price,

				)
				;
			unset($price);	
		}
		//$dump = $cruise;
		
		return array('cruise' => $cruise, 'cabins' => $cabins,'dump'=>$dump );
	}

    /**
	 * @Template("BaseBundle:Cruise:schedule.html.twig")
	
	 */		
	public function searchAction() {
		
		$request =  Request::createFromGlobals();
		
		$form = $request->get('form');

		$em = $this->getDoctrine()->getManager();
		
		$where = "";
		
		if(isset($form['startDate']))
		{
			$where .= "
			AND c.startdate >= ".strtotime($form['startDate']);
		}		
		if(isset($form['endDate']))
		{
			$where .= "
			AND c.enddate <= ".strtotime($form['endDate']);
		}
		if($form['ship'] > 0 )
		{
			$where .= "
			AND c.ship = ".$form['ship'];
		}
		if(isset($form['specialoffer']))
		{
			$where .= "
			AND code.specialOffer = 1";			
		}
		if(isset($form['burningCruise']))
		{
			$where .= "
			AND code.burningCruise = 1";			
		}	
		if(isset($form['reductionPrice']))
		{
			$where .= "
			AND code.reductionPrice = 1";			
		}
		if(isset($form['days']))
		{
			list($mindays,$maxdays) = explode(',',$form['days']);
			$where .= "
			AND c.daycount >=".$mindays;
			$where .= "
			AND c.daycount <=".$maxdays;			
		}		
		
		
		$str = "
		SELECT c,s,p,code
		FROM BaseBundle\Entity\CruiseCruise c
		LEFT JOIN c.ship s
		LEFT JOIN c.prices p
		LEFT JOIN c.code code
		WHERE p.tariff = 1
		".$where."
		

		
		ORDER BY c.startdate 
		
		";
		
		
		$q = $em->createQuery($str);
		
/*
		$qb = $this->getDoctrine()->getRepository("BaseBundle:CruiseCruise")->createQueryBuilder("c");

		$qb->select('c','s','p','code');
		$qb->innerJoin('c.ship','s');
		$qb->leftJoin('c.prices','p');
		//$qb->where('p.id IN (SELECT p.id FROM BaseBundle\Entity\CruiseShipCabinCruisePrice  ) ');
		$qb->leftJoin('p.tariff','tariff');
		$qb->leftJoin('c.code','code');
		
		
		if(isset($form['startDate']))
		{
			$qb->andWhere("c.startdate>=?1");
			$from = strtotime($form['startDate']);
			$qb->setParameter(1, $from);
		}
		
		if(isset($form['endDate']))
		{
		$qb->andWhere("c.enddate<=?2");
		$to = strtotime($form['endDate']);
		$qb->setParameter(2, $to);
		}

		
		if($form['ship'] > 0 ){
		
		$qb->andWhere("c.ship = ?3");
		$qb->setParameter(3, $form['ship']);	
		}
		
		if(isset($form['specialoffer']))
		{
		$qb->andWhere("code.specialOffer = ?4");
		$qb->setParameter(4, 1);			
		}

		if(isset($form['burningCruise']))
		{
		$qb->andWhere("code.burningCruise = ?5");
		$qb->setParameter(5, 1);			
		}	

		if(isset($form['reductionPrice']))
		{
		$qb->andWhere("code.reductionPrice = ?6");
		$qb->setParameter(6, 1);				
		}

		if(isset($form['days']))
		{
			list($mindays,$maxdays) = explode(',',$form['days']);
		$qb->andWhere("c.daycount >= ?7");
		$qb->andWhere("c.daycount <= ?8");
		$qb->setParameter(7, $mindays);				
		$qb->setParameter(8, $maxdays);				
		}


		if(isset($form['places']))
		{
		$qb->leftJoin('c.programItems','pi');	
		$qb->andWhere("pi.place IN(?9)");
		$qb->setParameter(9, implode(',',$form['places']));
		}	


		$qb->andWhere("tariff.id = 1");
		
		$qb->orderBy("c.startdate");
		
$dump = $qb->getQuery();

		*/
		$dump = $str;
		$result = $q->getResult();
		$result = new ArrayCollection($result);
		$result = $this->monthsSchedule($result);
		
		return array('cruises_months' => $result, 'dump'=>$dump);		
		
	}

	/**
	*@Template()
	*/
	public function searchFormAction()
	{
		$request =  Request::createFromGlobals();
		
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
		$minDate = $repository->findMinStartDate();
		$maxDate = $repository->findMaxStartDate();
		
		// понадобятся для фильтра по дням
		$minDays = $repository->findMinDays()->getDaycount();
		$maxDays = $repository->findMaxDays()->getDaycount();
		
		
		$form = $request->get('form');
		
		if(isset($form['days']))
		{
			$days = $form['days'];
		} 
		else
		{
			$days = $minDays.','.$maxDays;
		}
		
		
		$form_search = $this->createFormBuilder()
            ->add('startDate', 'date',array('widget' => 'single_text','data'=> new \DateTime(date("Y-m-d",$minDate->getStartdate())) ))
            ->add('endDate', 'date',array('widget' => 'single_text','data'=> new \DateTime(date("Y-m-d",$maxDate->getEnddate()))))
			
			->add('days','text',array('attr'=>array('data-slider-min'=>$minDays,'data-slider-max'=>$maxDays,'data-slider-value'=>'['.$days.']' )))
			
			->add('places','entity',array('class' => 'BaseBundle:CruisePlace','choices' =>  $this->getActivePlaces(), 'choice_label' => 'title','multiple'      => true,'expanded'      => true,))
			
			->add('ship','entity',array('class' => 'BaseBundle:CruiseShip',
					'choices' =>  $this->getActiveShip()
					,'choice_label' => 'title','placeholder'=>'Все теплоходы','required' => false))
			->add('specialoffer','checkbox',array('required'=> false,'label' => 'Специальный тариф'))
			->add('burningCruise','checkbox',array('required'=> false,'label' => '«Счастливый» круиз'))
			->add('button', 'submit',array('label' => 'Поиск'))
            ->getForm(); 

		if ($request->getMethod() == 'POST') {  
			$form_search->handleRequest($request);
		}
	return array('form_search' => $form_search->createView() );
	}

	/**
	 * @Template("BaseBundle:Cruise:schedule.html.twig")
	*/
	public function specialofferAction($offer)
	{
		$qb = $this->getDoctrine()->getRepository("BaseBundle:CruiseCruise")->createQueryBuilder("c");

		$qb->select('c','s','p','code');
		$qb->innerJoin('c.ship','s');
		$qb->leftJoin('c.prices','p');
		$qb->leftJoin('c.code','code');
		$qb->leftJoin('p.tariff','tariff');
		$qb->andWhere("tariff.id = 1");
		
		if($offer == "burningcruise")
		{
			$qb->andWhere("code.burningCruise = ?1");
		}
		elseif($offer == "reductionprice")
		{
			$qb->andWhere("code.reductionPrice = ?1");
		}
		
		elseif($offer == "specialoffer")
		{
			$qb->andWhere("code.specialOffer = ?1");
		}
		else
		{
			throw $this->createNotFoundException("Страница не найдена.");
		}	
		$qb->setParameter(1, 1);
	
		$qb->orderBy("c.startdate");
		$result = $qb->getQuery()->getResult();		
		$result = $this->monthsSchedule($result);
		return array('cruises_months' => $result);;
	}
	

	/**
	 * @Template() 
	*/
	public function categoryroutesAction($category)
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruiseCategory');
		$category = $repository->findWithCruises($category);
		$cruises_months= $this->monthsSchedule($category->getCruise());
		
		return array('cruises_months' => $cruises_months, 'category' => $category  );
	}


	
	public function getActivePlaces()
	{
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			"SELECT p 
			FROM BaseBundle:CruisePlace p 
			WHERE EXISTS 
				(SELECT pi FROM BaseBundle:CruiseCruiseProgramItem pi WHERE pi.place = p.id AND p.url <> '' )
			"
		);	
		return $query->getResult();

	}

	
	public function getActiveShip()
	{
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			'SELECT s 
			FROM BaseBundle:CruiseShip s 
			WHERE EXISTS
				(SELECT c FROM BaseBundle:CruiseCruise c WHERE c.ship = s.id )
			ORDER BY s.title
			'
		);
		
		return $query->getResult();

	}
	
	
}
