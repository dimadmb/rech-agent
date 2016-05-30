<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ApiController extends Controller
{
    /**
	 * @Template()
	 * @Route("/api/json/cruises", name="api_json_cruises" )
     */			
	public function cruisesAction()
	{
		$cruisesRepository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
		
		$cruises = $cruisesRepository->findApiAll();
		
		foreach($cruises as $cruise)
		{
			$cruises_json[$cruise->getCode()->getCode()]['is_happy'] = $cruise->getCode()->getBurningCruise();
			$cruises_json[$cruise->getCode()->getCode()]['is_special'] = $cruise->getCode()->getSpecialOffer();
			$cruises_json[$cruise->getCode()->getCode()]['date_start'] = $cruise->getStartdate();
			$cruises_json[$cruise->getCode()->getCode()]['date_stop'] = $cruise->getEnddate();
			$cruises_json[$cruise->getCode()->getCode()]['days'] = $cruise->getDaycount();
			$cruises_json[$cruise->getCode()->getCode()]['ship'] = $cruise->getShip()->getTitle();
			$cruises_json[$cruise->getCode()->getCode()]['ship_id'] = $cruise->getShip()->getMotorshipId();
			$cruises_json[$cruise->getCode()->getCode()]['route'] = $cruise->getRoute();
			
		}
		
		return array('cruises_json'=> json_encode($cruises_json));
	}
}
