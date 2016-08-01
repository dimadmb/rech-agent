<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ApiController extends Controller
{
    /**
	 * @Template()
	 * @Route("/api/json/cruises/{pre}", name="api_json_cruises" )
     */			
	public function cruisesAction($pre = false)
	{

		$cruises_json = $this->getCruises();
		
		if($pre) return array('cruises_json'=> '<pre>'.print_r($cruises_json,1).'</pre>');
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
	


	private function getDescription($cruise_code)
	{
		
		$cruisesRepository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
		$cruise_prices = $cruisesRepository->findOneApiByCode($cruise_code);
		
		$cruise_description  = array(
				'date_start' => $cruise_prices->getStartdate(),
				'date_stop' => $cruise_prices->getEnddate(),
				'route' => $cruise_prices->getRoute(),
				'ship' => $cruise_prices->getShip()->getTitle(),
				'ship_img' => $cruise_prices->getShip()->getImgurl(),
				
		);
		return $cruise_description;
	}
	
	private function getProgramm($cruise_code)
	{
		$cruisesRepository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			
		$cruise_programm = array(); 
		
		$cruise =  $cruisesRepository->findByUrl($cruise_code);
		
		if($cruise == null)
		{
			return array('array' => json_encode(array('error' => "Продажи путевок на выбранный тур завершены")));
		}
		
		foreach($cruise->getProgramItems() as $programmItem)
		{
			$cruise_programm[] = array(
					
					'date_start' => $programmItem->getDate(),
					'date_stop' => $programmItem->getDateStop(),
					'place' => $programmItem->getPlace()->getTitle(),
					'description' => $programmItem->getDescription(),
					
					);
			
		}
		
		return $cruise_programm;
	}
	
	
	private function getPrices($cruise_code)
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

		
		$sql="
		SELECT * 
		FROM aa_schet 

		LEFT JOIN aa_order ON aa_order.id_schet = aa_schet.id

		WHERE id_tur = $cruise_code

		AND aa_order.is_delete = 0

		AND aa_schet.status = 1
		";

		
		// нужно получить активные каюты
		$active_rooms = array();	
		foreach($results as $item)
		{
			$active_rooms[] = $item['num'];
		}		
		
		$statement = $connection->prepare($sql);
		$statement->execute();
		$results = $statement->fetchAll();


		
		// нужно получить занятые каюты
		$no_available_rooms = array();		
		foreach($results as $item)
		{
			$no_available_rooms[] = $item['num'];
		}
	
		$cruisesRepository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			
		$cruise_programm = array(); 
		
		$cruise_prices = $cruisesRepository->findOneApiByCode($cruise_code);
		
		if($cruise_prices == null)
		{
			return array('array' => json_encode(array('error' => "Продажи путевок на выбранный тур завершены")));
		}
		
		$koeff = $cruise_prices->getCode()->getBurningCruise() == 1 ? 0.8 : ($cruise_prices->getCode()->getSpecialOffer() == 1 ? 0.9 : 1);
		
		$prices = $cruise_prices->getPrices();

		foreach($prices as $price)
		{
			$dump[] = $price;
			foreach($price->getCabin()->getRooms() as $room)
			{
				$is_happy_kayuta = 0;
				$is_special_kayuta = 0;
				$available_rooms = 1;
				
				if(in_array( $room->getRoomNumber(), $active_rooms))
				{
					$price_koeff = (int)( $price->getPrice() * $koeff);
					$is_happy_kayuta = $cruise_prices->getCode()->getBurningCruise();
					$is_special_kayuta = $cruise_prices->getCode()->getSpecialOffer();
					
				}
				else 
				{
					$price_koeff = $price->getPrice();
				}
				
				if(in_array( $room->getRoomNumber(), $no_available_rooms))
				{
					$available_rooms = 0;
				}
				
				$rooms[$room->getRoomNumber()][$price->getRpId()->getRpId()][$price->getTariff()->getId()] = array(
						
						'deck' => $price->getCabin()->getDeckId()->getName(),
						'room_type' => $price->getCabin()->getRtId()->getRtName(),
						'number' => $room->getRoomNumber(),
						'count_place' => $price->getRpId()->getRpId(),
						'name_place' => $price->getRpId()->getRpName(),
						'tariff_name' => $price->getTariff()->getName(),
						'tariff_id' => $price->getTariff()->getId(),
						'price_old' =>$price->getPrice(),
						'price' => $price_koeff,
						'is_happy' => $is_happy_kayuta,
						'is_special' => $is_special_kayuta,
						'available_rooms' => $available_rooms,
						);
			}
			
			
		}
		
		return $rooms;
		
	}
	
	
    /**
	 * @Template()
	 * @Route("/api/json/kauta/{cruise_code}/{pre}", name="api_json_kauta" )
     */			
	public function kautaAction($cruise_code, $pre = false)
	{
		if($pre) return array('array' => '<pre>'.print_r(array('cruise' => $this->getDescription($cruise_code) ,'programm' => $this->getProgramm($cruise_code) , 'prices' => $this->getPrices($cruise_code),),1).'</pre>');
		
		return array('array' => json_encode(array('cruise' => $this->getDescription($cruise_code) ,'programm' => $this->getProgramm($cruise_code) , 'prices' => $this->getPrices($cruise_code),)));
	}
	
    /**
	 * @Template("BaseBundle:Api:kauta.html.twig")
	 * @Route("/api/json/prices/{cruise_code}/{pre}", name="api_json_prices" )
     */			
	public function pricesAction($cruise_code, $pre = false)
	{
		if($pre) return array('array' => '<pre>'.print_r(  $this->getPrices($cruise_code) ,1).'</pre>');
		
		return array('array' => json_encode($this->getPrices($cruise_code)));
	}
	
    /**
	 * @Template("BaseBundle:Api:kauta.html.twig")
	 * @Route("/api/json/timetable/{cruise_code}/{pre}", name="api_json_timetable" )
     */			
	public function timetableAction($cruise_code, $pre = false)
	{
		if($pre) return array('array' => '<pre>'.print_r(  $this->getProgramm($cruise_code) ,1).'</pre>');
		
		return array('array' => json_encode($this->getProgramm($cruise_code)));
	}
	
	
	
}
