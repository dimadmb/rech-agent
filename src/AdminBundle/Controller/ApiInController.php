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
		if(!in_array($val,array(0,1)))
		{
			return new Response('Значение 0 или 1');
		}
		//$not_val = $val == 1 ? 0 : 1;

		
		switch ($type)
		{
			case 'happy': 
			{
				$cruiseSpec->setBurningCruise($val);
				if($val == 1) $cruiseSpec->setSpecialOffer(0);
				break;
			}
				
			case 'spec':
			{
				$cruiseSpec->setSpecialOffer($val);
				if($val == 1) $cruiseSpec->setBurningCruise(0);
				break;
			}
			

			default: return new Response('FAIL ("happy or spec")');
		}
		
		$em->flush();
		return new Response('OK'); 
	}
}
