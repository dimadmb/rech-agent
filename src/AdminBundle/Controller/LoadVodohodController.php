<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\Common\Collections\ArrayCollection;

use BaseBundle\Entity\CruiseCruise;
use BaseBundle\Entity\CruiseShip;
use BaseBundle\Entity\Document;
use BaseBundle\Entity\CruiseShipCabinCruisePrice;
use BaseBundle\Entity\CruiseShipDeck;
use BaseBundle\Entity\CruiseShipCabinType;
use BaseBundle\Entity\CruiseShipCabin;
use BaseBundle\Entity\CruiseShipCabinPlace;
use BaseBundle\Entity\Port;
use BaseBundle\Entity\Excursion;


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
		$em = $this->getDoctrine()->getManager();
		$base_url = "http://www.vodohod.spb.ru/api/";
		
		/// загрузим таблицу палуб
		
		$decks_url = $base_url."decks.php";
		$decks_json = $this->curl_get_file_contents($decks_url);
		$decks_v = json_decode($decks_json,true);
		$decksRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipDeck');
		$cabinRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipCabin');
		$cabinTypeRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipCabinType');
		$cabinPlaceRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipCabinPlace');
		$portRepos = $this->getDoctrine()->getRepository('BaseBundle:Port');
		$excursionRepos = $this->getDoctrine()->getRepository('BaseBundle:Excursion');

		foreach($decks_v as $deck_v)
		{
			$deck = $decksRepos->findOneByDeckId($deck_v['deck_id']);
			if ($deck != null) {
				continue;
			}
			$deck = new CruiseShipDeck();
			$deck
				->setName($deck_v['deck_name'])
				->setDeckId($deck_v['deck_id'])
			;
			$em->persist($deck);
		}
		$em->flush();
		// палубы загрузили
		
		// типерь загрузим типы кают
		$room_types_url = $base_url."room_types.php";
		$room_types_json = $this->curl_get_file_contents($room_types_url);
		$room_types_v = json_decode($room_types_json,true);
			
		foreach($room_types_v as $room_type_v)
		{
			$room_type = $cabinTypeRepos->findOneByRtId($room_type_v['rt_id']);
			if ($room_type != null) {
				continue;
			}
			$room_type = new CruiseShipCabinType();
			$room_type
				->setRtId($room_type_v['rt_id'])
				->setRtName($room_type_v['rt_name'])
				->setRtComment($room_type_v['rt_comment'])
			;
			$em->persist($room_type);
		}
		$em->flush();
		
		// теперь загрузим типы размещения в каютах
		$room_placings_url = $base_url."room_placings.php";
		$room_placings_json = $this->curl_get_file_contents($room_placings_url);
		$room_placings_v = json_decode($room_placings_json,true);
				
		foreach($room_placings_v as $room_place_v)
		{
			$room_place = $cabinPlaceRepos->findOneByRpId($room_place_v['rp_id']);
			if ($room_place != null) {
				continue;
			}
			$room_place = new CruiseShipCabinPlace();
			$room_place
				->setRpId($room_place_v['rp_id'])
				->setRpName($room_place_v['rp_name'])
			;
			$em->persist($room_place);
		}
		$em->flush();		
		
		// загрузим порты 
		
		$ports_url = $base_url."ports.php";
		$ports_json =  $this->curl_get_file_contents($ports_url);
		$ports_v = json_decode($ports_json,true);
		foreach($ports_v as $port_v)
		{
			$port = $portRepos->findOneByPortId($port_v['port_id']);
			if($port != null)
			{
				continue;
			}
			
			$port = new Port();
			$port 
				->setPortId($port_v['port_id'])
				->setPortName($port_v['port_name'])
				->setPortCode($port_v['port_code'])
			;
			$em->persist($port);
		}
		$em->flush(); 
		
		$excursions_url = $base_url."excursions.php";
		$excursions_json =  $this->curl_get_file_contents($excursions_url);
		$excursions_v = json_decode($excursions_json,true);
		foreach($excursions_v as $excursion_v)
		{
			$excursion = $excursionRepos->findByExcursionId($excursion_v['excursion_id']);
			if($excursion != null)
			{
				continue;
			}	
			$excursion = new Excursion();
			$excursion 
					->setExcursionId($excursion_v['excursion_id'])
					->setPortId($excursion_v['port_id'])
					->setName($excursion_v['excursion_name'])
					->setDescription($excursion_v['excursion_description'])
				;
			$em->persist($excursion);
		}
		$em->flush();
		
		$cruise_days_url = $base_url."cruise_days.php";
		$cruise_days_json =  $this->curl_get_file_contents($cruise_days_url);
		$cruise_days_v = json_decode($cruise_days_json,true);
		foreach($cruise_days_v as $cruise_day_v)
		{
			//$cruise_program_item = 
		}
		
		
		
		
		$url_cruises = "http://cruises.vodohod.com/agency/json-cruises.htm?pauth=jnrehASKDLJcdakljdx";
		
		$cruises_json = $this->curl_get_file_contents($url_cruises);
		
		$url_motorships = "http://cruises.vodohod.com/agency/json-motorships.htm?pauth=jnrehASKDLJcdakljdx";
		
		$motorships_json = $this->curl_get_file_contents($url_motorships);
		
		$motorships = json_decode($motorships_json,true);

		//$cr = json_decode('['.$htm.']');
		$cruises_v = json_decode($cruises_json,true);
		/*
		foreach($cruises_v as &$cruise_v)
		{
			$cruise_v['motorship'] = $motorships[$cruise_v['motorship_id']]['name'];
		}
		*/
 
		
		
		$shipRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
		$classRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipClass');
		$tariffRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseTariff');

		

		
		foreach($motorships as $motorship_id=>$motorship)
		{
			if($motorship_id == $ship_id ){
			
			$shipCode = $motorship['code'];
			$shipName = $motorship['name'];
			$shipBody = $motorship['description'];
			$classId = 4;
			$class = $classRepos->find($classId);
			
			$ship = $shipRepos->findOneByCode($shipCode);
			
			if ($ship != null) {
				$em->remove($ship);
				//FIXME: remove after Doctrine fix
				$em->flush();
			}
			
			$ship = new CruiseShip();
			
			// Копируем фотографии
			
			$dir = $this->container->getParameter('kernel.root_dir').'/../web'.self::PATH_IMG.$shipCode;
			if(!is_dir($dir)) mkdir($dir) ;
			$img_main = "http://vodohod.com/cruises/vodohod/".$shipCode."/".$shipCode."-main.jpg";
			$newfile = $dir.'/'.$shipCode.'-main.jpg';
			$file_content = $this->curl_get_file_contents($img_main);
			$fp = fopen($newfile, "w");
			$test = fwrite($fp, $file_content); // Запись в файл
			//if ($test) echo 'Данные в файл успешно занесены.';
			//else echo 'Ошибка при записи в файл.';
			fclose($fp); //Закрытие файла	

			$img_decks = "http://vodohod.com/cruises/vodohod/".$shipCode."/".$shipCode."-decks.gif";
			$newfile = $dir.'/'.$shipCode.'-decks.gif';
			$file_content = $this->curl_get_file_contents($img_decks);
			$fp = fopen($newfile, "w");
			$test = fwrite($fp, $file_content); // Запись в файл
			//if ($test) echo 'Данные в файл успешно занесены.';
			//else echo 'Ошибка при записи в файл.';
			fclose($fp); //Закрытие файла	
			
			
			$ship->setImgurl(self::PATH_IMG.$shipCode.'/'.$shipCode.'-main.jpg');
			
			$ship->setCode($shipCode);
			$ship->setTitle($shipName);
			$ship->setClass($class);
			$ship->setProperties('');	
			$ship->setMotorshipId($motorship_id);	
			
			$em->persist($ship);
			
			
			

			/*
			// получаем все кабины и заносим их $ship->addCabin($num,$cabinClass,$deck,$side)
			$cabin_url = "http://r.a163.ru/api/kauta.php?id_teplohod=".$motorship_id;
			$cabin_json = $this->curl_get_file_contents($cabin_url);
			$cabins_v = json_decode($cabin_json,true);
			foreach($cabins_v as $cabin_v)
			{
				$num = $cabin_v['num'];
				$cabinClass = $cabin_v['id_class'];
				$deck = $cabin_v['deck'];
				$side = $cabin_v['side'];
				
				$cabin = $ship->addCabin($num,$cabinClass,$deck,$side);
				$em->persist($cabin);
			}
			*/
			
			
			
			$cabin_url = $base_url."rooms_motorship.php?motorship_id=".$motorship_id;
			$cabin_json = $this->curl_get_file_contents($cabin_url);
			$cabins_v = json_decode($cabin_json,true);
			foreach($cabins_v as $cabin_v)
			{
				$cabin = $ship->addCabin();
				
				$cabinType = $cabinTypeRepos->findOneByRtId($cabin_v['rt_id']);
				$Deck = $decksRepos->findOneByDeckId((int)$cabin_v['deck_id']);
				
				$cabin
					->setDeckId($Deck)
					->setRtId($cabinType)
					
				;	
				//$dump[] = $cabin;
				$em->persist($cabin);
				//$em->flush();
			}
			

			
			
			$cruiseRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			$categoryRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruiseCategory');
			
			// Создать страницы с теплоходами!!!
			
			$docRepos = $this->getDoctrine()->getRepository('BaseBundle:Document');
			$docShip = $docRepos->findOneByUrl('/cruise/ship/'.$shipCode);
			
			
			
			if ($docShip != null) {
				$em->remove($docShip);
				//FIXME: remove after Doctrine fix
				$em->flush();
			}
			
			$categoryId = $this->getDoctrine()->getRepository('BaseBundle:DocumentCategory')->findOneById(1001);			
			
			
			$shipContent = $this->renderView('AdminBundle:LoadVodohod:shipPage.html.twig',array(
					'img_main'=>self::PATH_IMG.$shipCode.'/'.$shipCode.'-main.jpg',
					'ship_description' => $shipBody,
					'img_deck' => self::PATH_IMG.$shipCode.'/'.$shipCode.'-decks.gif',
					));
			
			$docShip = new Document();
			$docShip
				->setTitle($shipName)
				->setUrl('/cruise/ship/'.$shipCode)
				->setCategoryId($categoryId)
				->setBody($shipContent)
				->setIsactive(1)
				->setDeletable(0)
				->setArchieved(0)
				->setContentTitle($shipName)
				
			;	
			$em->persist($docShip);
			//$em->flush();
			
			// Создать массив ассоциаций категорий круизов
			
			foreach($cruises_v as $code=>$cruise_v)
			{
				if($cruise_v["motorship_id"] == $motorship_id )
				{
					$route = $cruise_v["name"];
					$startDate = strtotime($cruise_v["date_start"]);
					$endDate = strtotime($cruise_v["date_stop"]);
					$dayCount = $cruise_v["days"];
					$categoryIds = "";
					$burningcruise = 		0;
					$reductionprice =       0;
					$specialOffer =         0;
					
					$categoriesToAdd = new ArrayCollection();
					
					$cruise = $ship->addCruise($code,$categoriesToAdd);
					
					$cruise->setCode($code);
					$cruise->setShip($ship);
					$cruise->setRoute($route);
					$cruise->setStartDate($startDate);
					$cruise->setEndDate($endDate);
					$cruise->setRoute($route);
					$cruise->setDayCount($dayCount);
					$cruise->setDescription("");
					$cruise->setSpecialOffer($specialOffer);
					$cruise->setBurningCruise($burningcruise);
					$cruise->setReductionPrice($reductionprice);
					$em->persist($cruise);	
					
					// стоянки
					
					// создть сущности port b excursion 
					
					
					
					// нужно создать все кабины, после чего создавать строки прайсов под эти кабины, причём создать их нужно при создании теплохода
					
					
					
					
					

					
				}
			}
			
			$em->persist($ship); 
			
			// здесь заливать прайсы
			// подготовить массив прайсов для данного теплохода 
			// можно выбирать в циклке по круизам теплохода (плучится массив прайсов для конкретного круиза, останется сопоставить его с кабинами)
			// 

			$tariffs = array();
			$cruiseTariffs = $tariffRepos->findAll();  
			foreach($cruiseTariffs as $tariff)
			{
				$tariffs[$tariff->getName()]  = $tariff;
			}
			
			$decks = array();
			$decksAll = $decksRepos->findAll();
			foreach($decksAll as $deck)
			{
				$decks[$deck->getName()] = $deck;
			}
 			
			$room_types = array();
			$room_types_all = $cabinTypeRepos->findAll();
			foreach($room_types_all as $room_type)
			{
				$room_types[$room_type->getRtComment()] = $room_type;
			} 	
			
			$room_places = array();
			$room_places_all = $cabinPlaceRepos->findAll();
			foreach($room_places_all as $room_place)
			{
				$room_places[$room_place->getRpName()] = $room_place;
			}
			
			$cabins = array();
			$cabins_all = $ship->getCabins();
			foreach($cabins_all as $cabin)
			{
				$cabins[$cabin->getRtId()->getRtId()][$cabin->getDeckId()->getDeckId()] = $cabin;
			}
			
			foreach ($ship->getCruises() as $cruise)
			{
				$code = $cruise->getCode();
				
				$url_prices  = "http://cruises.vodohod.com/agency/json-prices.htm?pauth=jnrehASKDLJcdakljdx&cruise=".$code;
				
				$prices_json = $this->curl_get_file_contents($url_prices);
				
				$prices_v = json_decode($prices_json,true);
				

				
				foreach($prices_v['tariffs'] as $p_t)
				{

					$cruiseTariff = $tariffs[$p_t['tariff_name']];
					
					// сделать проверку на существование тарифа, если нет, то дописать в базу его
					
					
					foreach($p_t['prices'] as $prices)
					{
						$deck = $decks[$prices['deck_name']];
						$rt_name = $room_types[$prices['rt_name']];
						$rp_id = $room_places[$prices['rp_name']];
						$price_value = $prices['price_value'];
						
						if($price_value <= 0) continue;

						
						// запишем это всё в price
						
						
						$price = new CruiseShipCabinCruisePrice();
						$cabin = $cabins[$rt_name->getRtId()][$deck->getDeckId()];
						
						$price	
								->setRpId($rp_id)  // а тут можно разрешить запись значения вместо объекта ( -1 запрос) 
								->setTariff($cruiseTariff)
								->setCruise($cruise)
								->setCabin($cabin)
								->setPrice($price_value)
						;
						$em->persist($price);
						
					}
					
				}
				
			}

			
			
			
			$em->persist($ship); 
			
			};
			
			
			$em->flush(); // удалить
			
			
		}
		
		if(!isset($dump)) $dump = array();
		return array('cruises'=>''/*$cruises_v*/,'dump' => $dump );
	}
}
