<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use BaseBundle\Entity\CruiseCruise;
use BaseBundle\Entity\CruiseShip;

class LoadVodohodController extends Controller
{
	const PATH_IMG = "/bundles/cruise/ship/";
	
	
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
	public function indexAction()
	{
		
		$url_cruises = "http://cruises.vodohod.com/agency/json-cruises.htm?pauth=jnrehASKDLJcdakljdx";
		
		$cruises_json = $this->curl_get_file_contents($url_cruises);
		
		$url_motorships = "http://cruises.vodohod.com/agency/json-motorships.htm?pauth=jnrehASKDLJcdakljdx";
		
		$motorships_json = $this->curl_get_file_contents($url_motorships);
		
		$dump = $motorships = json_decode($motorships_json,true);
		
		$em = $this->getDoctrine()->getManager();
		$shipRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
		$classRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipClass');
		
		foreach($motorships as $motorship)
		{
			$shipCode = $motorship['code'];
			$shipName = $motorship['name'];
			$classId = 4;
			$class = $classRepos->find($classId);
			
			$ship = $shipRepos->findOneByCode($shipCode);
			
			if ($ship != null) {
				$em->remove($ship);
				//FIXME: remove after Doctrine fix
				$em->flush();
			}
			
			$ship = new CruiseShip();
			
			$ship->setImgurl(self::PATH_IMG.$shipCode.'-main.jpg');
			
			$ship->setCode($shipCode);
			$ship->setTitle($shipName);
			$ship->setClass($class);
			$ship->setProperties('');	
			
			$cruiseRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			
			$em->persist($ship); // удалить
			$em->flush(); // удалить
		}
		
		
		
		//$cr = json_decode('['.$htm.']');
		$cr = json_decode($cruises_json,true);
		
		foreach($cr as &$cruise)
		{
			$cruise['motorship'] = $motorships[$cruise['motorship_id']]['name'];
		}
		
		return array('cruises'=>$cr,'dump'=>$dump);
	}
}
