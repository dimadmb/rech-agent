<?php
namespace BaseBundle\Controller\Helper;

use BaseBundle\Entity;
use Doctrine\ORM\EntityManager;

class PrepareCruiseRow  {



	public static function prepare(Entity\CruiseCruise $cruise, $cat = false, EntityManager $entityManager) {
		$wrap = new \stdClass();
		$wrap->route = $cruise->getRoute();
		$wrap->ship = $cruise->getShip()->getTitle();
		$wrap->start = date("d.m.Y", $cruise->getStartdate());
		$wrap->end = date("d.m.Y", $cruise->getEnddate());
		$wrap->startFull = date("d.m.Y", $cruise->getStartdate());
		$wrap->endFull = date("d.m.Y", $cruise->getEnddate());
		$wrap->days = $cruise->getDaycount();
		$wrap->turOperator = $cruise->getTurOperator();
		$wrap->shipUrl = ShipUrl::create($cruise->getShip());
		$minprice = $cruise->getMinprice();
		$wrap->minprice = $minprice < 1 ? "-" : $minprice . "&nbsp;руб.";
		
		$wrap->cruiseUrl = CruiseUrl::create($cruise);
		
		$wrap->specialoffer =   $cruise->getCode()->getSpecialoffer();
		$wrap->burningCruise = $cruise->getCode()->getBurningCruise();
		$wrap->reductionPrice = $cruise->getCode()->getReductionPrice();
		/*if($cat) {
			$category = $cruise->getCategory()->Category;
			
			$wrap->categoryUrl = CruiseCategoryUrl::create($category);
			
		}*/
		if($wrap->specialoffer == 1  || $wrap->burningCruise == 1)
		{
			//$wrap->prices = get_class_methods($cruise->getPrices());
			$cruise->getPrices()->setInitialized(false);
			$cruise->getPrices()->initialize(false);
			$wrap->prices = $cruise->getPrices();
			
			$cruise_code = $cruise->getCode()->getCode();
			$sql="
			SELECT * FROM `aa_discount`
			WHERE id_tur = $cruise_code
			";
			
			//$wrap->prices = get_class_methods($this);
			
			$em_booking = $entityManager->getDoctrine()->getManager('booking');
			$connection = $em_booking->getConnection();
			$statement = $connection->prepare($sql);
			$statement->execute();
			$results = $statement->fetchAll();
			// нужно получить активные каюты
			$active_rooms = array();
			foreach($results as $item)
			{
				$active_rooms[] = $item['num'];
			}
			
		}			
		
		
		return $wrap;
	}
	
	public static function prepareForShip(Entity\CruiseCruise $cruise) {
		$wrap = new \stdClass();
		$wrap->route = $cruise->getRoute();
		$wrap->start = date("d.m.Y", $cruise->getStartdate());
		$wrap->end = date("d.m.Y", $cruise->getEnddate());
		$wrap->days = $cruise->getDaycount();
		$minprice = $cruise->getMinprice();
		$wrap->minprice = $minprice < 1 ? "-" : $minprice . "&nbsp;руб.";
		$wrap->url = CruiseUrl::create($cruise);
		return $wrap;
	}
	
}