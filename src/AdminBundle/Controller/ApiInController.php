<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ApiInController extends Controller
{
	
	/**
	 * @Route("/api_in/cruise/{type}/{code}/{val}" , name="api_in_cruise_hot" )
     */		
	public function cruiseHotAction($type,$code,$val)
	{	
		$em = $this->getDoctrine()->getManager();
		$cruiseSpecRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruiseSpec');
		$cruiseSpec = $cruiseSpecRepos->findOneByCode($code);
		if($cruiseSpec == null)
		{
			return new Response('Данного круиза нет в базе');
		}	
		switch ($type)
		{
			case 'hot': $cruiseSpec->setBurningCruise($val); break;
			case 'spec': $cruiseSpec->setSpecialOffer($val); break;
			default: return new Response('FAIL ("hot or spec")');
		}
		
		$em->flush();
		return new Response('OK'); 
	}
}
