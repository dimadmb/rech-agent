<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\Common\Collections\ArrayCollection;

use BaseBundle\Entity\CruiseCruise;
use BaseBundle\Entity\CruiseCruiseCategory;
use BaseBundle\Entity\CruiseShip;
use BaseBundle\Entity\Document;
use BaseBundle\Entity\Photo;
use BaseBundle\Entity\CruiseShipCabinCruisePrice;
use BaseBundle\Entity\CruiseShipDeck;
use BaseBundle\Entity\CruiseShipCabinType;
use BaseBundle\Entity\CruiseShipCabin;
use BaseBundle\Entity\CruiseShipCabinPlace;
use BaseBundle\Entity\CruisePlace;

use BaseBundle\Entity\CruiseCruiseProgramItem;
use BaseBundle\Entity\CruiseCruiseSpec;

use BaseBundle\Entity\CruiseShipRoom;
use BaseBundle\Entity\CruiseShipRoomProp;


use BaseBundle\Controller\Helper as Helper;

class LoadVodohodController extends Controller
{
	const PATH_IMG = "/bundles/base/files/cruise/ship/";
	
	
	public function curl_get_file_contents($URL)
		{
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $URL);
			$contents = curl_exec($c);
			curl_close($c);

			if ($contents) return $contents;
				else return FALSE;
		}


		
	/**
	 * @Template()
	 * @Route("/admin/loadvodohod", name="loadvodohod" )
     */			
	public function loadAction()
	{
		$url_motorships = "http://cruises.vodohod.com/agency/json-motorships.htm?pauth=jnrehASKDLJcdakljdx";
		
		$motorships_json = $this->curl_get_file_contents($url_motorships);
		
		$motorships = json_decode($motorships_json,true);

		foreach($motorships as $motorship_id=>$motorship)
		{
			$ships[] = array('id' => $motorship_id, 'name' => $motorship['name']);
		}
		
		return array('ships' => $ships);
	}	

		

	/**
	 * @Template()
	 * @Route("/admin/loadvodohod_ship/{ship_id}", name="loadvodohod_ship" )
     */			
	public function indexAction($ship_id = null)
	{
		$load = $this->get('admin.loadship');
		$res = $load->load($ship_id);
		return  $res;
		//return $load->load($ship_id);
	}


}
