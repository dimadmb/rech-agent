<?php

namespace AdminBundle\Services;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\Common\Collections\ArrayCollection;


use BaseBundle\Entity\CruiseCruise;
use BaseBundle\Entity\CruiseShip;
use BaseBundle\Entity\CruiseShipCabinType;
use BaseBundle\Entity\CruiseShipRoom;
use BaseBundle\Entity\CruiseCruiseSpec;
use BaseBundle\Entity\CruiseShipCabinCruisePrice;

use BaseBundle\Entity\CruiseShipDeck;

use BaseBundle\Entity\CruisePlace;
use BaseBundle\Entity\CruiseCruiseProgramItem;

use BaseBundle\Entity\Document;
use BaseBundle\Entity\Photo;

use BaseBundle\Entity\CruiseTariff;
use BaseBundle\Entity\CruiseMeals;


use BaseBundle\Controller\Helper as Helper;

class LoadShipMosturflot  extends Controller
{

	private $doctrine;
	private $em;
	private $templating;
	private $simple_html_dom;
	
	const PATH_IMG = "/bundles/base/files/cruise/ship/";
	//const API_KEY = "";
	//const BASE_URL = "";
	const BASE_URL_KEY = "https://booking.mosturflot.ru/api?userhash=60b5fe8b827586ece92f85865c186513ed3e7bfa&section=rivercruises&";
	
//booking.mosturflot.ru/api?userhash=60b5fe8b827586ece92f85865c186513ed3e7bfa&section=rivercruises&request=ship&shipid=5&images=1&cabins=1	
	
	public function __construct($doctrine, $templating, $simple_html_dom)
	{
		$this->doctrine = $doctrine;
		$this->em = $this->doctrine->getManager();
		$this->templating = $templating;
		$this->simple_html_dom = $simple_html_dom;
	}

	
    public function curl_get_file_contents($URL)
    	{
    		$c = curl_init();
    		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($c, CURLOPT_URL, $URL);
    		curl_setopt($c, CURLOPT_TIMEOUT_MS, 2000);
    		$contents = curl_exec($c);
    		curl_close($c);
    
    		if ($contents) return $contents;
    			else return FALSE;
    	}

	public function URL2XML( $url )
	{
		$string = $this->curl_get_file_contents($url);
		return simplexml_load_string($string);
	}
	
		


	// ПОЛУЧИТЬ СПИСОК ТЕПЛОХОДОВ
	public function getShips()
	{
		$url = self::BASE_URL_KEY."request=ships";
		foreach($this->URL2XML( $url )->answer->item as $item)
		{
			$array[] = $item;
		}
		return $array;
	}	
	
	// ПОЛУЧИТЬ ИНФОРМАЦИЮ О ТЕПЛОХОДЕ
	public function getShip($ship_id)
	{
		$url = self::BASE_URL_KEY."request=ship&shipid=".$ship_id."&images=true&cabins=true";
		return $this->URL2XML( $url );
	}
	
	// ПОЛУЧИТЬ СПИСОК КРУИЗОВ ТЕПЛОХОДА
	public function getCruises($ship_id)
	{
		$url = self::BASE_URL_KEY."request=tours&routedetail=true&shipid=".$ship_id."&tariffs=true";
		return $this->URL2XML( $url );
	}	
	
	// ПОЛУЧИТЬ СПИСОК ИНФОРМАЦИЮ О КРУИЗЕ
	public function getCruiseDetail($cruise_id)
	{
		$url = self::BASE_URL_KEY."request=tour&tourid=".$cruise_id."&routedetail=1";
		return $this->URL2XML( $url );
	}

	public function loadShip($ship_id)
	{
		
		$shipXML = $this->getShip($ship_id);
		$shipName = (string)$shipXML->answer->shipname;
		$shipCode = Helper\Convert::translit($shipName);
		$shipImage = "https://".(string)$shipXML->answer->shiptitleimage;
		$shipImageDeck = "https://".(string)$shipXML->answer->shipdeckplan;
		$shipBodyOrigin = (string)$shipXML->answer->shipdesc;
		$shipBody =  preg_replace('#<a href=(?:.*)(?=</a>)#Usi', '', $shipBodyOrigin);
		$shipBody =  strip_tags($shipBody,'<strong><div><p><b><br>');
		if(false !== strpos($shipBodyOrigin,"Теплоход-ПАНСИОНАТ")) $shipBody = "<b>Теплоход-ПАНСИОНАТ</b>".$shipBody;
		$shipPhotos = $shipXML->answer->shipimages->item;
		
		
		$cruisesXML = $this->getCruises($ship_id);
		
		
		
		
		
		
		
		
		$em = $this->em;
		$classRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipClass');
		$shipRepos = $this->doctrine->getRepository('BaseBundle:CruiseShip');
		$decksRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipDeck');
		$cabinTypeRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabinType');
		$cabinPlaceRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabinPlace');
		$cruiseSpecRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruiseSpec');
		$tariffRepos = $this->doctrine->getRepository('BaseBundle:CruiseTariff');
		$mealsRepos = $this->doctrine->getRepository('BaseBundle:CruiseMeals');	
		$placeRepos = $this->doctrine->getRepository('BaseBundle:CruisePlace');
		$progItemRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruiseProgramItem');
		
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

		$dir = (__DIR__).'/../../../web'.self::PATH_IMG.$shipCode;

		if(!is_dir($dir)) mkdir($dir,0777,true) ;
		$img_main = $shipImage;
		$newfile = $dir.'/'.$shipCode.'-main.jpg';
		$file_content = $this->curl_get_file_contents($img_main);
		$fp = fopen($newfile, "w");
		$test = fwrite($fp, $file_content); // Запись в файл
		//if ($test) echo 'Данные в файл успешно занесены.';
		//else echo 'Ошибка при записи в файл.';
		fclose($fp); //Закрытие файла	

		$img_decks = $shipImageDeck;
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
		$ship->setMotorshipId('88' . $ship_id);	
		
		$em->persist($ship);
		$em->flush();
		
		// Создать страницы с теплоходами!!!
		
		$docRepos = $this->doctrine->getRepository('BaseBundle:Document');
		$docShip = $docRepos->findOneByUrl('/cruise/ship/'.$shipCode);
		
		
		
		if ($docShip != null) {
			$em->remove($docShip);
			//FIXME: remove after Doctrine fix
			$em->flush();
		}
		
		$categoryId = $this->doctrine->getRepository('BaseBundle:DocumentCategory')->findOneById(1001);			
		
		
		$shipContent = $this->templating->render('AdminBundle:LoadVodohod:shipPage.html.twig',array(
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



			$i = 0;
			foreach($shipPhotos as $element) 
			{				
				$i++;
				// получаем адрес фото
				$photo_url =  "https://".$element->image;
				$photo_title =$element->desc;
				
				// получаем название файла 
				$arr = explode('/',$photo_url);
				$photo_name = $shipCode."-".$i.".jpg";
				
				// сохраняем файл на диск 
				$newfile = $dir.'/'.$photo_name;
				$file_content = $this->curl_get_file_contents($photo_url);
				$fp = fopen($newfile, "w");
				$test = fwrite($fp, $file_content); // Запись в файл
				//if ($test) echo 'Данные в файл успешно занесены.';
				//else echo 'Ошибка при записи в файл.';
				fclose($fp); //Закрытие файла	
				
				
				$photo = new Photo();
				$photo
					->setTitle($photo_title)
					->setDescription('')
					->setFilename($photo_name)
					->setDocument($docShip)
				;	
				$em->persist($photo);

				
				$docShip->addPhoto($photo);
			}
			
			# ФОТОГРАФИИ

			$em->persist($docShip);
			$em->flush();

			
			
			
			// ПОЛУЧИМ СПИСОК ПАЛУБ ИЗ БД
			
			$decksAll = $decksRepos->findAll();
			foreach($decksAll as $deck)
			{
				$decksByName[$deck->getName()] = $deck;
				$decksById[$deck->getDeckId()] = $deck;
			}
			// ПОЛУЧИМ СПИСОК ТИПОВ КАЮТ ИЗ БД
			
			$room_types_all = $cabinTypeRepos->findAll();
			foreach($room_types_all as $room_type)
			{
				$room_types[$room_type->getRtComment()] = $room_type;
				$room_typesById[$room_type->getId()] = $room_type;
			}
			
			
			// СОЗДАДИМ МАССИВ УНИКАЛЬНЫХ ТИПОВ КАЮТ
			$cabinsArray = array();
			foreach($shipXML->answer->shipcabins->item as $item)
			{
				$deck = "Неопределена";
				
				if(strpos((string)$item->cabindesc, "средней")) $deck = "Средняя";
				if(strpos((string)$item->cabindesc, "нижней")) $deck = "Нижняя";
				if(strpos((string)$item->cabindesc, "главной")) $deck = "Главная";
				if(strpos((string)$item->cabindesc, "солнечной")) $deck = "Солнечная";
				if(strpos((string)$item->cabindesc, "шлюпочной")) $deck = "Шлюпочная";
				if(strpos((string)$item->cabindesc, "Нева")) $deck = "Шлюпочная";
				
				//return array('ship' => (string)$item->cabindesc);
				
				if(!(
					isset($cabinsArray[$deck][(string)$item->cabincategoryname]) &&
					$cabinsArray[$deck][(string)$item->cabincategoryname]["place_count"] >= (int)$item->cabinmainpass ))
				{
					$cabinsArray[$deck][(string)$item->cabincategoryname] = array(
						"place_count" => (int)$item->cabinmainpass,
					);
				}
				

				
			}
			
			
			foreach($cabinsArray as $deckName => $cabinInDeck)
			{
				foreach($cabinInDeck as $cabinTypeName => $item)
				{
					// ДОБАВИМ ТИПЫ КАЮТ В БАЗУ, ЕСЛИ ОНИ ОТСУТСТВУЮТ
					if(!isset($room_types[$cabinTypeName]))
					{
						$cabinType = new CruiseShipCabinType();
						$cabinType 
							->setRtName($cabinTypeName)
							->setRtComment($cabinTypeName)
							->setPlaceCountMax($item["place_count"])
						;
						$em->persist($cabinType);
						$em->flush();
						$room_types[$cabinType->getRtComment()] = $cabinType;
						$room_typesById[$cabinType->getId()] = $cabinType;	
					}
					
					// 	И ДОБАВИМ ЭТИ КАЮТЫ В ТЕПЛОХОД
					$cabin = $ship->addCabin();
					$cabinType = $cabinTypeRepos->findOneByRtComment($cabinTypeName);
					$deck = $decksRepos->findOneByName($deckName);
					
					$cabin
						->setDeckId($deck)
						->setRtId($cabinType)
					;
					$em->persist($cabin);
					
					
				}
			}
			
			$em->persist($ship);
			$em->flush();
			
			/// теперь надо пройтись по круизам и ценам
			
			
			$cabins_all = $ship->getCabins();
			foreach($cabins_all as $cabin)
			{
				$cabins[$cabin->getRtId()->getId()][$cabin->getDeckId()->getDeckId()] = $cabin;
			}
			
			
			$cruiseSpecsAll = $cruiseSpecRepos->findAll();
			foreach($cruiseSpecsAll as $cruiseSpecItem)
			{
				$cruiseSpec[$cruiseSpecItem->getCode()] = $cruiseSpecItem;
			}
			
			$room_places = array();
			$room_places_all = $cabinPlaceRepos->findAll();
			foreach($room_places_all as $room_place)
			{
				$room_places[$room_place->getRpName()] = $room_place;
				$room_places_count[$room_place->getId()] = $room_place;
			}	


			$tariffs = array();
			$cruiseTariffs = $tariffRepos->findAll();  
			foreach($cruiseTariffs as $tariff)
			{
				$tariffs[$tariff->getName()]  = $tariff;
			}
			
			$meals = array();
			$cruiseMeals = $mealsRepos->findAll();  
			foreach($cruiseMeals as $meals)
			{
				$mealss[$meals->getName()]  = $meals;
			}				
			
			$placesAll = $placeRepos->findAll();
			foreach($placesAll as $placesAllItem)
			{
				$places[$placesAllItem->getTitle()] = $placesAllItem;
			}
			
			// КРУИЗЫ 
			foreach($cruisesXML->answer->item as $cruiseItem)
			{
				
				$code_mos = (int)$cruiseItem->tourid;
				$code  = (int)('88'.$code_mos);
				
				if(!isset($cruiseSpec[$code]))
				{
					$spec = new CruiseCruiseSpec();
					$spec
						->setCode($code)
						->setSpecialOffer(0)
						->setBurningCruise(0)
						->setReductionPrice(0)
					;	
					$em->persist($spec);
					$em->flush();
					$cruiseSpec[$code] = $spec;
				}
				
				$route = (string)$cruiseItem->tourroute;
				$startDate = strtotime((string)$cruiseItem->tourstart);
				$endDate = strtotime((string)$cruiseItem->tourfinish);
				$dayCount = (int)$cruiseItem->tourdays;
				$categoryIds = "";
				$categoriesToAdd = new ArrayCollection();
				$cruise = $ship->addCruise($code,$categoriesToAdd);
				
				$cruise->setCode($cruiseSpec[$code]);
				$cruise->setShip($ship);
				$cruise->setRoute($route);
				$cruise->setStartDate($startDate);
				$cruise->setEndDate($endDate);
				$cruise->setDayCount($dayCount);
				$cruise->setDescription("");
				$cruise->setTurOperator("infoflot");
				$em->persist($cruise);
				
				// ЦЕНЫ 
				foreach($cruiseItem->tourtariffs->item as $tourtariffsItem)
				{
					$categoryname = (string)$tourtariffsItem->categoryname;
					
					// проверим есть ли такой тип каюты, нет - добавим
					if(!isset($room_types[$categoryname]))
					{
						$cabinType = new CruiseShipCabinType();
						$cabinType 
							->setRtName($categoryname)
							->setRtComment($categoryname)
							
						;
						$em->persist($cabinType);
						$em->flush();
						$room_types[$cabinType->getRtComment()] = $cabinType;
						$room_typesById[$cabinType->getId()] = $cabinType;					
					}
					
					$rt_name = $room_types[$categoryname];
					
					if(isset($cabins[$rt_name->getId()]))
					{
						$cabin = $cabins[$rt_name->getId()];
					}
					else 
					{
						continue;
					}	
						
					$rp_id = $room_places_count[$rt_name->getPlaceCountMax()];	
					
					
					
					foreach($tourtariffsItem->categorytariffs->item as $tarriffType)
					{
						
						
						
						if(isset($tariffs[(string)$tarriffType->tariffname]))
						{
							$cruiseTariff = $tariffs[(string)$tarriffType->tariffname];
						}
						else
						{
							$cruiseTariff = new CruiseTariff();
							$cruiseTariff
								->setName((string)$tarriffType->tariffname)
								;
							$em->persist($cruiseTariff);
							$em->flush();
							$tariffs[(string)$tarriffType->tariffname] = $cruiseTariff; 
						};
						
						$tarriff = $tariffs[(string)$tarriffType->tariffname];
						
						if($tarriff->getId() == 8) continue;
						
						foreach($tarriffType->meals->item as $meals)
						{
							if(isset($mealss[(string)$meals->mealname]))
							{
								$meal = $mealss[(string)$meals->mealname];
							}
							else
							{
								$meal = new CruiseMeals();
								$meal
									->setName((string)$meals->mealname)
								;
								$em->persist($meal);
								$em->flush();
								$mealss[(string)$meals->mealname] = $meal;
								
							}
							
							// теперь грузим сами цены
							foreach($cabin as $cab)
							{
															
								$price = new CruiseShipCabinCruisePrice();
								$price	
										->setRpId($rp_id)  
										->setTariff( $tarriff )
										->setCruise($cruise)
										->setCabin($cab)    
										->setPrice($meals->mainprice)
										->setMeals($meal)
								;
								$em->persist($price);
							}
							

						
						}
						
					}
						
						
				} // КОНЕЦ ЦЕН
				
				// ПОГРАММЫ КРУИЗОВ
				$cruiseDetailXML = $this->getCruiseDetail($code_mos);

				foreach($cruiseDetailXML->answer->tourroutedetail->item as $tourProgrammItem)
				{
					// сделать проверку на прогрузку программы
					$cruise_program_item = new CruiseCruiseProgramItem();
					
					$startDate = (string)$tourProgrammItem->arrival == "" ? strtotime($tourProgrammItem->date) : strtotime($tourProgrammItem->arrival);
					
					$endDate = (string)$tourProgrammItem->departure == "" ? strtotime($tourProgrammItem->date) : strtotime($tourProgrammItem->departure);

					
					//$startDate = strtotime($tourProgrammItem->arrival);
					//$endDate = strtotime($tourProgrammItem->departure);
					
					
					$description = $tourProgrammItem->note == "" ? "" : $tourProgrammItem->note;
					
										
					if(isset($tourProgrammItem->excursions['items']) && $tourProgrammItem->excursions['items'] > 1  )
					{
						foreach($tourProgrammItem->excursions->item as $excursion)
						{
							$desc = preg_replace("!<a[^>]*>(.*)</a>!isU","<b>\$1</b>", (string)$excursion->desc);
							$description .= (int)$excursion->type == 1 ? "<b>Дополнительная экскурсия</b>" : "";
							$description .= $desc."<br>";
							
							
							//$description .= (string)$excursion->desc;
						}
					}
					elseif(isset($tourProgrammItem->excursions['items']) && $tourProgrammItem->excursions['items'] = 1 && isset($tourProgrammItem->excursions->item->desc) )
					{
						
						$desc = preg_replace("!<a[^>]*>(.*)</a>!isU","<b>\$1</b>", $tourProgrammItem->excursions->item->desc);
						$description .= (int)$tourProgrammItem->excursions->item->type == 1 ? "<b>Дополнительная экскурсия</b>" : "";
						$description .= $desc."";
					}
					
					$placeName = (string)$tourProgrammItem->cityname;

					$port = isset($places[$placeName]) ? $places[$placeName] : null;

					

					
					$cruise_program_item
									->setCruise($cruise)
									->setPlace($port)
									->setOrd(500)
									->setDate($startDate)
									->setDateStop($endDate)
									->setDescription($description)
									->setPlacetitle($placeName)
									
						;	
					$em->persist($cruise_program_item);
				}
				

			}
			
			
			
			
			$em->persist($cruise); 
			$em->persist($ship); 
			$em->flush(); 
			
			
		
		
		return array('ship' => $cruisesXML->answer->item);
		return array('ship' => $ship->getTitle());
	}
	
	
	
	
	
	
	
}