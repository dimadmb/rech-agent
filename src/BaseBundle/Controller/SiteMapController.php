<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SiteMapController extends Controller
{
	 /**

	 * @Route("/sitemap.xml", name="sitemapxml" , defaults={"_format" = "xml"} )
     */		
	public function indexAction(Request $request)
	{
		$baseUrl = $request->server->get('REQUEST_SCHEME')."://".$request->server->get('SERVER_NAME');
		// домашняя страница
		$sitemap[] = ['loc'=>$baseUrl,'priority'=>1, 'changefreq'=> 'daily'];
		// расписание по месяцам
		foreach($this->months() as $month)
		{
			$sitemap[] = ['loc'=>$baseUrl.$month->url,'priority'=>0.8, 'changefreq'=> 'daily'];
		}
		// все теплоходы
		$sitemap[] = ['loc'=>$baseUrl.$this->generateUrl("alphabetlist"),'priority'=>0.8, 'changefreq'=> 'daily'];
		// список теплоходов
		// не выводить, так как будет дубль при выводе документов
		foreach($this->alphabetlist() as $ship)
		{
			//$sitemap[] = ['loc'=>$baseUrl.$this->generateUrl("ship",["ship"=>$ship->getCode()]),'priority'=>0.8, 'changefreq'=> 'daily'];
		}
		
		//$docs = $this->getDoctrine()->getRepository('BaseBundle:Document')->findAll();//findForSiteMap();
		$docs = $this->getDoctrine()->getRepository('BaseBundle:Document')->findForSiteMap();
		foreach($docs as $doc)
		{
			$sitemap[] = ['loc'=>$baseUrl.$doc->getUrl().'.html','priority'=>0.8, 'changefreq'=> 'daily'];
		}
		
		// круизы 
		$cruises = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findApiAll();
		foreach($cruises as $cruise)
		{
			$sitemap[] = ['loc'=>$baseUrl.'/cruise/cruisedetails/'.$cruise->getShip()->getCode().'_'.$cruise->getCode()->getCode().'.html','priority'=>0.8, 'changefreq'=> 'daily'];
		}
		
		
		
		$xmloutput = $this->container->get('templating')
				->render('BaseBundle:SiteMap:index.xml.twig', ['sitemap'=>$sitemap]);
		$response = new Response($xmloutput);		
		return $response ;
	}
	
	public function months() {
		$months = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise')->findMonths();
		$result = array();
		$current = "";
		foreach ($months as $month) {
			$date = date('M Y', $month['startdate']);
		if ($date == $current) continue;
			$model = new \stdClass();
			//$model->title = Helper\Convert::month_ru($month['startdate']);
			$model->url = $this->generateUrl("month_cruises", array("month" => strtotime($date)));
			$result[] = $model;
			$current = $date;
		}
		$model = new \stdClass();
		//$model->title = "Все круизы";
		$model->url = $this->generateUrl("monthschedule");
		$result[] = $model;
		return $result;
	}

	public function alphabetlist()
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
		$ships = $repository->findBy(array(),array('title' => 'ASC' ));
		return $ships;
	}		
	
}
