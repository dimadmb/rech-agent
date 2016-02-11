<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BaseBundle\Controller\Helper;
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
	
	# выводит список ссылок на месяцы
	private function months() {
		$months = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findMonths();
		$result = array();
		$current = "";
		foreach ($months as $month) {
			$date = date('M Y', $month['startdate']);
		if ($date == $current) continue;
			$model = new \stdClass();
			//$model->title = Exx\StringUtils::month($month['startdate']);
			$model->title = self::month_ru($month['startdate']);
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
		$title = self::month_ru($month);
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
		foreach ($cruises as $cruise) {
			$startDate = $cruise->getStartdate();
			$month = date("M Y", $startDate);
			if ($month != $currentMonth) {
				$group = new \stdClass();
				$group->name = self::month_ru($startDate);
				$result[] = $group;
				$currentMonth = $month;
			}
			$wrap = Helper\PrepareCruiseRow::prepare($cruise);
			$group->row[] = $wrap;
		}
		return /*$cruises;//*/$result;
	}	

    /**
	 * @Template()
	
	 */		
	public function detailsAction($url)
	{
		$cruise = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findByUrl(Helper\CruiseUrl::parse($url));
		return array('cruise' => $cruise,);
	}

    /**
	 * @Template("BaseBundle:Cruise:schedule.html.twig")
	
	 */		
	public function searchAction() {
		
		$request =  Request::createFromGlobals();
		
		$form = $request->get('form');

		$qb = $this->getDoctrine()->getRepository("BaseBundle:CruiseCruise")->createQueryBuilder("c");

		$qb->select('c','s','p','pi');
		$qb->innerJoin('c.ship','s');
		$qb->leftJoin('c.prices','p');
		$qb->leftJoin('c.programItems','pi');

		$qb->where("c.startdate>=?1");
		$qb->andWhere("c.enddate<=?2");
		
		$from = strtotime($form['startDate']);
		$to = strtotime($form['endDate']);
		$qb->setParameter(1, $from);
		$qb->setParameter(2, $to);


		
		if($form['ship'] > 0 ){
		
		$qb->andWhere("c.ship = ?3");
		$qb->setParameter(3, $form['ship']);	
		}
		
		if(isset($form['specialoffer']))
		{
		$qb->andWhere("c.specialoffer = ?4");
		$qb->setParameter(4, 1);			
		}

		if(isset($form['burningCruise']))
		{
		$qb->andWhere("c.burningCruise = ?5");
		$qb->setParameter(5, 1);			
		}	

		if(isset($form['reductionPrice']))
		{
		$qb->andWhere("c.reductionPrice = ?6");
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
		$qb->andWhere("pi.place IN(?9)");
		$qb->setParameter(9, implode(',',$form['places']));
		}	
		
		$qb->orderBy("c.startdate");

		//$qb->getQuery()->execute();
		$result = $qb->getQuery()->getResult();
		$result = new ArrayCollection($result);
		$result = $this->monthsSchedule($result);
		
		return array('cruises_months' => $result);		
		
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
			
			->add('days','text',array('attr'=>array('data-slider-min'=>$minDays,'data-slider-max'=>$maxDays,'data-slider-value'=>'['.$days.']','id'=>'days-form' )))
			
			->add('places','entity',array('class' => 'BaseBundle:CruisePlace','choices' =>  $this->getActivePlaces(), 'choice_label' => 'title','multiple'      => true,'expanded'      => true,))
			
			//->add('places', 'choice' ,array('class' => 'BaseBundle:CruisePlace','choices' =>  $this->getActivePlaces()) )
			
			->add('ship','entity',array('class' => 'BaseBundle:CruiseShip',
					'choices' =>  $this->getActiveShip()
					,'choice_label' => 'title','empty_value'=>'Все теплоходы','required' => false))
			->add('specialoffer','checkbox',array('required'=> false,'label' => 'Специальный тариф'))
			->add('burningCruise','checkbox',array('required'=> false,'label' => '«Горящий» круиз'))
			->add('reductionPrice','checkbox',array('required'=> false,'label' => 'Сниженная цена'))
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

		$qb->select('c','s','p');
		$qb->innerJoin('c.ship','s');
		$qb->leftJoin('c.prices','p');

		
		if($offer == "burningcruise")
		{
			$qb->andWhere("c.burningCruise = ?1");
		}
		elseif($offer == "reductionprice")
		{
			$qb->andWhere("c.reductionPrice = ?1");
		}
		
		elseif($offer == "specialoffer")
		{
			$qb->andWhere("c.specialoffer = ?1");
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
	
	
	public function getActivePlaces()
	{
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			'SELECT p 
			FROM BaseBundle:CruisePlace p 
			WHERE EXISTS 
				(SELECT pi FROM BaseBundle:CruiseCruiseProgramItem pi WHERE pi.place = p.id )
			'
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
	
	public static function month_ru($timestamp) {
		setlocale(LC_TIME, "ru_RU.UTF-8");
		//$res = mb_convert_encoding(strftime('%B %Y', $timestamp), "UTF-8", "WINDOWS-1251");
		$res = strftime('%B %Y', $timestamp);
		$months = array(
			"January" => "Январь",
			"February" => "Февраль",
			"March" => "Март",
			"April" => "Апрель",
			"May" => "Май",
			"June" => "Июнь",
			"July" => "Июль",
			"August" => "Август",
			"September" => "Сентябрь",
			"October" => "Октябрь",
			"November" => "Ноябрь",
			"December" => "Декабрь"
		);
		return str_replace(array_keys($months), array_values($months), $res);
	}	
	
}
