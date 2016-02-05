<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BaseBundle\Controller\Helper;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use BaseBundle\Entity\CruiseCruise;

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
		return $result;
	}	



	

    /**
	 * @Template("BaseBundle:Cruise:month.html.twig")
	 */		
	public function specialOffersAction()
	{
		$cruises = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findSpecial();
		foreach ($cruises as $cruise) {
			$wrap = Helper\PrepareCruiseRow::prepare($cruise);
			$result[] = $wrap;
			//$result[] = $cruises;
		}		
		return  array("cruises" => $result, "title" => "Специальные предложения");
	}

	 
	 
    /**
	 * @Template()
	
	 */		
	public function detailsAction($url)
	{
		$cruise = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findByUrl(Helper\CruiseUrl::parse($url));
		
		//$data['cruise'] = $cruise; //Helper\PrepareCruiseRow::prepare($cruise, true);
		//$data['programItems'] = $cruise->getProgramItems();
		//$data['prices'] = $cruise->getPrices();
		
		return array('cruise' => $cruise,);

		
	}





	
	private function getSearchParameters() {
		$query = $this->getRequest();
		$selected = new \stdClass();
		$selected->dateFrom = $query->get("datefrom", date("d-m-Y", time()));
		$toTime = mktime(0,0,0,date("m", time()) + 1);
		$selected->dateTo = $query->get("dateto", date("d-m-Y", $toTime));
		$selected->class = $query->get("class", "");
		$places = array();
		$prepare = explode(" или ", $query->get("route", ""));
		foreach($prepare as $i=>$place) {
			if (trim($place) == "") continue;
			$places[] = trim($place);
		}
		$selected->route = join(" или ", $places);
		return $selected;
	}	
	
    /**
	 * @Template("BaseBundle:Cruise:schedule.html.twig")
	
	 */		
	public function searchAction() {
		
		$request =  Request::createFromGlobals();
		
		$form = $request->get('form');
		$selected = $this->getSearchParameters();
		$qb = $this->getDoctrine()->getRepository("BaseBundle:CruiseCruise")->createQueryBuilder("c");

		$places = array();
		foreach(explode("или", $selected->route) as $place) {
			if (trim($place) == "") continue;
			//$places[] = Exx\FileUtils::translit($place);
		}
		$qb->where("c.startdate>=?1");
		$qb->andWhere("c.enddate<=?2");
		
		$from = strtotime($form['startDate']);
		$to = strtotime($form['endDate']);
		$qb->setParameter(1, $from);
		$qb->setParameter(2, $to);
		
		if (sizeof($places) > 0) {
			$qb->join("c.programItems", "pi");
			$qb->join("pi.place", "pl");
			
			$str = "";
			foreach ($places as $i=>$place) {
				$param = "place" . $i;
				$str .= "pl.url = :" . $param;
				if ($i < sizeof($places)-1) {
					$str .= " OR ";
				}
				$qb->setParameter($param, $place);
			}
			$qb->andWhere("($str)");
		}
		/*
		if($selected->class != "-1") {
			$qb->join("c.ship", "s");
			$qb->andWhere("s.class=?4");
			$qb->setParameter(4, $selected->class);
		}
		*/
		
		$qb->orderBy("c.startdate");

		$qb->getQuery()->execute();
		$result = $qb->getQuery()->getResult();
		$result = new ArrayCollection($result);
		$result = $this->monthsSchedule($result);
		
		return array('cruises_months' => $result);		
		
	}
/*
	 public function searchformAction(Request $request)
	 {
		 $search = new stdClass();
	 }
*/	
	/**
	*@Template()
	*/
	public function searchFormAction()
	{
		$request =  Request::createFromGlobals();
		
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
		$minDate = $repository->findMinStartDate();
		$maxDate = $repository->findMaxStartDate();
		
		

		
		$form_search = $this->createFormBuilder()
            ->add('startDate', 'date',array('widget' => 'single_text', 'data'=> new \DateTime(date("Y-m-d",$minDate->getStartdate())) ))
            ->add('endDate', 'date',array('widget' => 'single_text','data'=> new \DateTime(date("Y-m-d",$maxDate->getEnddate()))))
			->add('ship','entity',array('class' => 'BaseBundle:CruiseShip','property' => 'title'))
			->add('button', 'submit')
            ->getForm();
			
			
			
	$data = 'новая форма';
	
		if ($request->getMethod() == 'POST') {  
			$form_search->bind($request);
			//$data = $form_search->getData();
			
		}
		

	return array('form_search' => $form_search->createView(),'test'=>$data );
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
