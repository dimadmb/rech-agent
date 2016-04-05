<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BaseBundle\Controller\Helper as Helper;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

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

		$qb = $this->getDoctrine()->getRepository("BaseBundle:CruiseCruise")->createQueryBuilder("c");
		$qb->select('c','s','p');
		$qb->innerJoin('c.ship','s');
		$qb->leftJoin('c.prices','p');
		$qb->leftJoin('p.tariff','tariff');
		$qb->andWhere("tariff.id = 1");
		
		
		$qb->andWhere("s.code = ?1");
		$qb->setParameter(1, $ship);			
		
		$qb->orderBy("c.startdate");

		$result = $qb->getQuery()->getResult();
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
		
		$cruiseShipPrice = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip')->findByUrl(Helper\CruiseUrl::parse($url));
		
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
