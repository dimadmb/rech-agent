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

use BaseBundle\Entity\CruisePlace;
use BaseBundle\Entity\CruiseCruiseProgramItem;

use BaseBundle\Entity\Document;
use BaseBundle\Entity\Photo;


use BaseBundle\Controller\Helper as Helper;

class LoadShipInfoflot  extends Controller
{

	private $doctrine;
	private $em;
	private $templating;
	private $simple_html_dom;
	
	
	const PATH_IMG = "/bundles/base/files/cruise/ship/";
	const API_KEY = "68a3d0c23cf277febd26dc1fa459787522f32006";
	const BASE_URL = "http://api.infoflot.com/JSON/";
	const BASE_URL_KEY = "http://api.infoflot.com/JSON/68a3d0c23cf277febd26dc1fa459787522f32006";
	
	
	
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
	
	
	// ПОЛУЧИТЬ ЭКСКУРСИИ КРУИЗА
	public function getExcursions($cruise_id, $ship_id = 1)
	{
		$url = self::BASE_URL_KEY."/Excursions/".$ship_id."/".$cruise_id."/";
		$json = $this->curl_get_file_contents($url);
		
		return json_decode($json,true);
	}
	
	// ПОЛУЧИТЬ СПИСОК ТЕПЛОХОДОВ
	public function getShips()
	{
		$url = self::BASE_URL_KEY."/Ships/";
		$json = $this->curl_get_file_contents($url);
		
		return json_decode($json,true);
	}
	
	// ПОЛУЧИТЬ НАЗВАНИЕ ТЕПЛОХОДА
	public function getShipName($ship_id)
	{
		return $this->getShips()[$ship_id];
	}
	
	// ПОЛУЧИТЬ ГЛАВНУЮ КАРТИНКУ ТЕПЛОХОДА
	public function getShipImage($ship_id)
	{
		$url = self::BASE_URL_KEY."/ShipsImages/";
		$json = $this->curl_get_file_contents($url);
		
		return json_decode($json,true)[$ship_id];
	}	
	
	// ПОЛУЧИТЬ СХЕМУ ПАЛУБ ТЕПЛОХОДА
	public function getShipImageDeck($ship_id)
	{
		$url = self::BASE_URL_KEY."/ShipsSchemes/";
		$json = $this->curl_get_file_contents($url);
		
		return json_decode($json,true)[$ship_id];
	}	
	
	// ПОЛУЧИТЬ КАЮТЫ ТЕПЛОХОДА
	public function getShipCabins($ship_id)
	{
		$url = self::BASE_URL_KEY."/Cabins/".$ship_id."/";
		$json = $this->curl_get_file_contents($url);
		$array = json_decode($json,true);
		// сделать проверку на получение валидного массива
		foreach($array as $item)
		{
			$place_count = count($item["places"]);
			$rooms[$item["deck_name"]][$item["type"]][] = array("name"=>$item["name"],"count"=>$place_count );
		}
			
		return $rooms;
	}		
	// ПОЛУЧИТЬ КАЮТЫ ТЕПЛОХОДА test 
	public function getShipRooms($ship_id)
	{
		$url = self::BASE_URL_KEY."/Cabins/".$ship_id."/";
		$json = $this->curl_get_file_contents($url);
		$array = json_decode($json,true);
		

			
		return $array;
	}	
	
	// ПОЛУЧИТЬ ФОТОГРАФИИ ТЕПЛОХОДА
	public function getShipPhotos($ship_id)
	{
		$url = self::BASE_URL_KEY."/ShipsPhoto/".$ship_id."/";
		$json = $this->curl_get_file_contents($url);
		$array = json_decode($json,true);
		if(!is_array($array))
		{
			return null;
		}
		foreach($array as $item)
		{
			$photos[] = $item["full"];
		}
		if(!isset($photos)) return null;
		return $photos;
	}

	// ПОЛУЧИТЬ СПИСОК КРУИЗОВ
	public function getShipCruises($ship_id)
	{
		$url = self::BASE_URL_KEY."/Tours/".$ship_id."/";
		$json = $this->curl_get_file_contents($url);
		return json_decode($json,true);
	}
	
	// ПОЛУЧИТЬ ОПИСАНИЕ ТЕПЛОХОДА
	public function getShipDescription($ship_id)
	{
		$url = self::BASE_URL_KEY."/ShipsDescription/".$ship_id."/";
		$json = $this->curl_get_file_contents($url);
		return json_decode($json,true);
	}
	
	
	public function LoadShipInfoflotData($ship_id)
	{
		$cpl = 3;
		for($i=0;$i<=$cpl;$i++)
		{
			$shipName = $this->getShipName($ship_id);
			if ($shipName != null) break;
		}
		for($i=0;$i<=$cpl;$i++)
		{
			$shipImage = $this->getShipImage($ship_id);
			if ($shipImage != null) break;
		}
		for($i=0;$i<=$cpl;$i++)
		{
			$shipImageDeck = $this->getShipImageDeck($ship_id);
			if ($shipImage != null) break;
		}
		for($i=0;$i<=$cpl;$i++)
		{
			$shipPhotos = $this->getShipPhotos($ship_id);
			if ($shipPhotos != null) break;
		}
		for($i=0;$i<=$cpl;$i++)
		{
			$shipBody = nl2br($this->getShipDescription($ship_id));
			if ($shipBody != null) break;
		}
		for($i=0;$i<=$cpl;$i++)
		{
			$cruises = $this->getShipCruises($ship_id);
			if ($cruises != null) break;
		}
		for($i=0;$i<=$cpl;$i++)
		{
			$shipCabins = $this->getShipCabins($ship_id);
			if ($cruises != null) break;
		}
		$shipCode = Helper\Convert::translit($shipName);
		
		// сделать проверку, что всё прогрузилось, только после этого удалять теплоход
		if($shipName == null)
		{
			return array('error' => "Ошибка загрузки имени теплохода");
		}	
		elseif($shipImage == null)
		{
			return array('error' => "Ошибка загрузки главного фото теплохода");
		}		
		elseif($shipImageDeck == null)
		{
			return array('error' => "Ошибка загрузки фото палуб теплохода");
		}		
		elseif($shipPhotos == null)
		{
			return array('error' => "Ошибка загрузки фотографий теплохода");
		}		
		elseif($shipBody == null)
		{
			return array('error' => "Ошибка загрузки описания теплохода");
		}		
		elseif($cruises == null)
		{
			return array('error' => "Ошибка загрузки круизов теплохода");
		}		
		elseif($shipCabins == null)
		{
			return array('error' => "Ошибка загрузки кают теплохода");
		}
		
		
		else 
		{
			return array('shipName'=>$shipName, 'shipCode' => $shipCode , 'shipImage' => $shipImage, 'shipImageDeck' => $shipImageDeck, 'shipBody' => $shipBody , 'cruises' => $cruises, 'shipPhotos' => $shipPhotos, 'shipCabins' => $shipCabins);
		}
	}
	
	public function loadShip($ship_id)
	{

		$shipData = $this->LoadShipInfoflotData($ship_id);

		
		if(isset($shipData['error']))
		{
			return array($shipData['error']);
		}

		
		foreach($shipData as $key => $value)
		{
			$$key = $value;
		}
		//unset($shipData);

		$em = $this->em;
		$classRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipClass');
		$shipRepos = $this->doctrine->getRepository('BaseBundle:CruiseShip');
		$decksRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipDeck');
		$cabinTypeRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabinType');
		$cabinPlaceRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabinPlace');
		$cruiseSpecRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruiseSpec');
		$tariffRepos = $this->doctrine->getRepository('BaseBundle:CruiseTariff');
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
		$ship->setMotorshipId('99' . $ship_id);	
		
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
		
		//$em->flush();

			# ФОТОГРАФИИ
			

			$i = 0;
			foreach($shipPhotos as $element) 
			{				
				$i++;
				// получаем адрес фото
				$photo_url =  $element;
				$photo_title ='';
				
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

			foreach($shipCabins as $deckName => $cabinss )
			{
				// проверим есть ли такая палуба, нет - добавим
				if(!isset($decksByName[$deckName]))
				{
					$deck = new CruiseShipDeck();
					$deck
						->setName($deckName)
						
					;	
					$em->persist($deck);
					$em->flush();	
					$decksByName[$deck->getName()] = $deck;
					$decksById[$deck->getDeckId()] = $deck;					
				}
				
				
				foreach($cabinss as $cabinName => $rooms )
				{
					// проверим есть ли такой тип каюты, нет - добавим
					if(!isset($room_types[$cabinName]))
					{
						$cabinType = new CruiseShipCabinType();
						$cabinType 
							->setRtName($cabinName)
							->setRtComment($cabinName)
							->setPlaceCountMax($rooms[0]['count'])
						;
						$em->persist($cabinType);
						$em->flush();
						$room_types[$cabinType->getRtComment()] = $cabinType;
						$room_typesById[$cabinType->getId()] = $cabinType;					
					}
					
					$cabin = $ship->addCabin();
					$cabinType = $cabinTypeRepos->findOneByRtComment($cabinName);
					$deck = $decksRepos->findOneByName($deckName);
					
					$cabin
						->setDeckId($deck)
						->setRtId($cabinType)
					;

					foreach($rooms as $roomItem)
					{

					
						$room = new CruiseShipRoom();
						$room
							->setRoomNumber($roomItem['name'])
						;
						$em->persist($room);
						$cabin->addRoom($room);
					}

					$em->persist($cabin);
					$em->flush();
				}

			}
			
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
				$tariffs[$tariff->getId()]  = $tariff;
			}		
			
			$placesAll = $placeRepos->findAll();
			foreach($placesAll as $placesAllItem)
			{
				$places[$placesAllItem->getTitle()] = $placesAllItem;
			}
			
			// ТЕПЕРЬ ОБОЙДЁМ ВСЕ КРУИЗЫ ЭТОГО ТЕПЛОХОДА
			foreach($cruises as $code => $cruise_i)
			{
					$code_inf = $code;
					$code  = (int)('99'.$code);
					


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
					
					$route = $cruise_i['route'];
					$startDate = strtotime($cruise_i["date_start"].' '.$cruise_i["time_start"]);
					$endDate = strtotime($cruise_i["date_end"].' '.$cruise_i["time_end"]);
					$dayCount = $cruise_i["days"];
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

					
					
					foreach($cruise_i['prices'] as $priceItem)
					{
						// проверим есть ли такой тип каюты, нет - добавим
						if(!isset($room_types[$priceItem['name']]))
						{
							$cabinType = new CruiseShipCabinType();
							$cabinType 
								->setRtName($priceItem['name'])
								->setRtComment($priceItem['name'])
								
							;
							$em->persist($cabinType);
							$em->flush();
							$room_types[$cabinType->getRtComment()] = $cabinType;
							$room_typesById[$cabinType->getId()] = $cabinType;					
						}
						
						$rt_name = $room_types[$priceItem['name']];
						
						if(isset($cabins[$rt_name->getId()]))
						{
							$cabin = $cabins[$rt_name->getId()];
						}
						else 
						{
							continue;
						}	
						
						$rp_id = $room_places_count[$rt_name->getPlaceCountMax()];

						foreach($cabin as $cab)
						{
							$price = new CruiseShipCabinCruisePrice();
							$price	
									->setRpId($rp_id)  
									->setTariff( $tariffs[1] )
									->setCruise($cruise)
									->setCabin($cab)
									->setPrice($priceItem['price'])
							;
							$em->persist($price);
							
							if($rt_name->getPlaceCountMax() > 1)
							{
								$price = new CruiseShipCabinCruisePrice();
								$price	
										->setRpId($rp_id)  // а тут можно разрешить запись значения вместо объекта ( -1 запрос) 
										->setTariff( $tariffs[2] )
										->setCruise($cruise)
										->setCabin($cab)
										->setPrice((int)$priceItem['price']*0.85)
								;
								$em->persist($price);
								
							}

						}
							
						
						
						
					}
					
				/// осталось загрузить программы круизов
				$i = 0;
				do 
				{
					$i++;
					$programm = $this->getExcursions($code_inf, $ship_id );
				} while (!is_array($programm) && count($programm)>0 && $i < 10);
				
				if(!is_array($programm))
				{
					return array('error' => "Программа не прогружается ");
				}
				
				foreach($programm as $programmItem)
				{
					// сделать проверку на прогрузку программы
					$cruise_program_item = new CruiseCruiseProgramItem();
					$startDate = strtotime($programmItem["date_start"].' '.$programmItem["time_start"]);
					$endDate = strtotime($programmItem["date_end"].' '.$programmItem["time_end"]);
					
					$port = isset($places[$programmItem['city']]) ? $places[$programmItem['city']] : null;
					
					$cruise_program_item
									->setCruise($cruise)
									->setPlace($port)
									->setOrd(500)
									->setDate($startDate)
									->setDateStop($endDate)
									->setDescription(strip_tags($programmItem['description'], '<p><br><div>'))
									->setPlacetitle($programmItem['city'])
									
						;	
						$em->persist($cruise_program_item);
					
					
				}
					$em->persist($cruise); 
					$em->flush();
			}
			
					$em->persist($ship); 
					$em->flush(); 
			
			

		//return array();
		return array($programm);
		
	}
	
	
	
	
	
	
	
}







