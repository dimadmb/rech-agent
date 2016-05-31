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

		$cruises_json = $this->getCruises();
		
		return array('cruises_json'=> json_encode($cruises_json));
	}
	
	private function getCruises()
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
		return $cruises_json;
	}
	
	
    /**
	 * @Template()
	 * @Route("/api/json/kauta/{cruise_code}", name="api_json_kauta" )
     */			
	public function kautaAction($cruise_code)
	{

		$sql="
		SELECT * FROM `aa_discount`
		WHERE id_tur = $cruise_code
		";
		$em_booking = $this->getDoctrine()->getManager('booking');
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
	
	
		$cruisesRepository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			
		$cruise_programm = array(); 
		
		foreach($cruisesRepository->findByUrl($cruise_code)->getProgramItems() as $programmItem)
		{
			$cruise_programm[] = array(
					
					'date_start' => $programmItem->getDate(),
					'date_stop' => $programmItem->getDateStop(),
					'place' => $programmItem->getPlace()->getTitle(),
					'description' => $programmItem->getDescription(),
					
					);
			
		}
		
		$cruise_prices = $cruisesRepository->findOneApiByCode($cruise_code);
		

		$cruise_description  = array(
				'date_start' => $cruise_prices->getStartdate(),
				'date_stop' => $cruise_prices->getEnddate(),
				'route' => $cruise_prices->getRoute(),
				'ship' => $cruise_prices->getShip()->getTitle(),
				'ship_img' => $cruise_prices->getShip()->getImgurl(),
				
		);
		
		$koeff = $cruise_prices->getCode()->getBurningCruise() == 1 ? 0.8 : ($cruise_prices->getCode()->getSpecialOffer() == 1 ? 0.9 : 1);
		
		$prices = $cruise_prices->getPrices();

		foreach($prices as $price)
		{
			$dump[] = $price;
			foreach($price->getCabin()->getRooms() as $room)
			{
				
				if(in_array( $room->getRoomNumber(), $active_rooms))
				{
					$price_koeff = (int)( $price->getPrice() * $koeff);
				}
				else 
				{
					$price_koeff = $price->getPrice();
				}
				
				$rooms[$room->getRoomNumber()][$price->getRpId()->getRpId()][$price->getTariff()->getId()] = array(
						
						'deck' => $price->getCabin()->getDeckId()->getName(),
						'room_type' => $price->getCabin()->getRtId()->getRtName(),
						'number' => $room->getRoomNumber(),
						'count_place' => $price->getRpId()->getRpId(),
						'name_place' => $price->getRpId()->getRpName(),
						'tariff_name' => $price->getTariff()->getName(),
						'tariff_id' => $price->getTariff()->getId(),
						'price' => $price_koeff,
						);
			}
			
			
		}
		
		

		
		return array('array' => json_encode(array('cruise' => $cruise_description ,'programm' => $cruise_programm , 'prices' => $rooms,)));
	}
	
	
	
	
	
}
