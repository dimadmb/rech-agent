<?php

namespace AdminBundle\Services;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerAware;
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
use BaseBundle\Entity\CruiseTariff;


use BaseBundle\Controller\Helper as Helper;

class LoadShip  extends Controller
{

	const PATH_IMG = "/bundles/base/files/cruise/ship/";
	
	private $doctrine;
	private $templating;
	private $simple_html_dom;
	
	
	public function __construct($doctrine, $templating, $simple_html_dom)
	{
		$this->doctrine = $doctrine;
		$this->templating = $templating;
		$this->simple_html_dom = $simple_html_dom;
	}

	
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
	

	
	public function load($ship_id)
	{
		$em = $this->doctrine->getManager();
		$base_url = "http://www.vodohod.spb.ru/api/";
		
		/// загрузим таблицу палуб
		

		$decksRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipDeck');
		$cabinRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabin');
		$cabinTypeRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabinType');
		$cabinPlaceRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipCabinPlace');
		$placeRepos = $this->doctrine->getRepository('BaseBundle:CruisePlace');
		//$excursionRepos = $this->doctrine->getRepository('BaseBundle:Excursion');
		$progItemRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruiseProgramItem'); 
		$cruiseSpecRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruiseSpec');
		$shipRepos = $this->doctrine->getRepository('BaseBundle:CruiseShip');
		$classRepos = $this->doctrine->getRepository('BaseBundle:CruiseShipClass');
		$tariffRepos = $this->doctrine->getRepository('BaseBundle:CruiseTariff');		
		$cruiseRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruise');
		$categoryRepos = $this->doctrine->getRepository('BaseBundle:CruiseCruiseCategory');
		
		
		
		$cruiseSpecsAll = $cruiseSpecRepos->findAll();
		foreach($cruiseSpecsAll as $cruiseSpecItem)
		{
			$cruiseSpec[$cruiseSpecItem->getCode()] = $cruiseSpecItem;
		}		

		
		
		$decks_url = $base_url."decks.php";
		$decks_json = $this->curl_get_file_contents($decks_url);
		$decks_v = json_decode($decks_json,true);

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
			$place = $placeRepos->findOneByPlaceId($port_v['port_id']);
			if($place != null)
			{
				continue;
			}
			
			$place = new CruisePlace();
			$place 
				->setPlaceId($port_v['port_id'])
				->setTitle($port_v['port_name'])
				->setUrl($port_v['port_code'])
				->setType('prt')
				->setSearcheable(1)
				->setPageable(1)
			;
			$em->persist($place);
		}
		$em->flush(); 
		
		$placesAll = $placeRepos->findAll();
		foreach($placesAll as $placesAllItem)
		{
			$places[$placesAllItem->getTitle()] = $placesAllItem;
		}
		
		
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
				$decksById[$deck->getDeckId()] = $deck;
			}
			
 			
			$room_types = array();
			$room_types_all = $cabinTypeRepos->findAll();
			foreach($room_types_all as $room_type)
			{
				$room_types[$room_type->getRtComment()] = $room_type;
				$room_typesById[$room_type->getRtId()] = $room_type;
			} 	
			
			$room_places = array();
			$room_places_all = $cabinPlaceRepos->findAll();
			foreach($room_places_all as $room_place)
			{
				$room_places[$room_place->getRpName()] = $room_place;
			}
			
			

		$categoryCruisesAll = array();
		$crCategory_all = $categoryRepos->findAll();
		foreach($crCategory_all as  $categoryCruises)
		{
			$categoryCruisesAll[$categoryCruises->getTitle()] = $categoryCruises;
		}

			
		
		
		
		$url_cruises = "http://cruises.vodohod.com/agency/json-cruises.htm?pauth=jnrehASKDLJcdakljdx";
		
		$cruises_json = $this->curl_get_file_contents($url_cruises);
		
		$url_motorships = "http://cruises.vodohod.com/agency/json-motorships.htm?pauth=jnrehASKDLJcdakljdx";
		
		$motorships_json = $this->curl_get_file_contents($url_motorships);
		
		$motorships = json_decode($motorships_json,true);

		$cruises_v = json_decode($cruises_json,true);

 

		
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
			

			
			$dir = (__DIR__).'/../../../web'.self::PATH_IMG.$shipCode;

			if(!is_dir($dir)) mkdir($dir,0777,true) ;
			$img_main = "https://vodohod.com/cruises/vodohod/".$shipCode."/".$shipCode."-main.jpg";
			$newfile = $dir.'/'.$shipCode.'-main.jpg';
			$file_content = $this->curl_get_file_contents($img_main);
			$fp = fopen($newfile, "w");
			$test = fwrite($fp, $file_content); // Запись в файл
			//if ($test) echo 'Данные в файл успешно занесены.';
			//else echo 'Ошибка при записи в файл.';
			fclose($fp); //Закрытие файла	

			$img_decks = "https://vodohod.com/cruises/vodohod/".$shipCode."/".$shipCode."-decks.gif";
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
			
			
			
			// ROOM 

			// получаем все кабины и заносим их $ship->addRoom($num,$cabinClass,$deck,$side)
			$room_url = $base_url."rooms.php?motorship_id=".$motorship_id;
			$room_json = $this->curl_get_file_contents($room_url);
			$rooms_v = json_decode($room_json,true);


			foreach($rooms_v as $room_v)
			{
				$rooms[$room_v['deck_id']][$room_v['rt_id']][]	 = $room_v;
			}
			
			
			$cabin_url = $base_url."rooms_motorship.php?motorship_id=".$motorship_id;
			$cabin_json = $this->curl_get_file_contents($cabin_url);
			$cabins_v = json_decode($cabin_json,true);
			foreach($cabins_v as $cabin_v)
			{
				$cabin = $ship->addCabin();
				
				$cabinType = $cabinTypeRepos->findOneByRtId($cabin_v['rt_id']);
				$deck = $decksRepos->findOneByDeckId((int)$cabin_v['deck_id']);
				
				$cabin
					->setDeckId($deck)
					->setRtId($cabinType)
				;
				foreach($rooms[$cabin_v['deck_id']][$cabin_v['rt_id']] as $roomItem)
				{

				
					$room = new CruiseShipRoom();
					$room
						->setRoomNumber($roomItem['room_number'])
					;
					$em->persist($room);
					$cabin->addRoom($room);
				}

				$em->persist($cabin);
			}
			
			$cabins = array();
			$cabins_all = $ship->getCabins();
			foreach($cabins_all as $cabin)
			{
				$cabins[$cabin->getRtId()->getRtId()][$cabin->getDeckId()->getDeckId()] = $cabin;
			}

			
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
			
			$base_url_vodohod = "https://vodohod.com";
			$parser = $this->simple_html_dom;
			$htmlFoto = $this->curl_get_file_contents("https://vodohod.com/cruises/vodohod/".$shipCode."/foto.htm");
			$parser->load($htmlFoto);
			
			if ( !$htmlFoto || isset($parser->getElementByTagName('h2')->attr['title']) && $parser->getElementByTagName('h2')->attr['title'] == "error 404")
			{
			$htmlFoto = $this->curl_get_file_contents("https://vodohod.com/cruises/vodohod/".$shipCode."/photo.htm");
				$parser->load($htmlFoto);				
			}

			foreach($parser->find('.item a') as $element) 
			{
								
				// получаем адрес фото
				$photo_url =  $base_url_vodohod.$element->href;
				$photo_title = $element->title;
				
				// получаем название файла 
				$arr = explode('/',$photo_url);
				$photo_name = array_pop($arr);
				
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

			
			// Создать массив ассоциаций категорий круизов
			
			foreach($cruises_v as $code=>$cruise_v)
			{
				if($cruise_v["motorship_id"] == $motorship_id )
				{
					
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
						$cruiseSpec[$code] = $spec;
					}
					
					
					
					$route = $cruise_v["name"];
					$startDate = strtotime($cruise_v["date_start"]);
					$endDate = strtotime($cruise_v["date_stop"]);
					$dayCount = $cruise_v["days"];
					$categoryIds = "";
					
					$categoriesToAdd = new ArrayCollection();
					
					foreach($cruise_v["directions"] as $direct)
					{
						if(!isset($categoryCruisesAll[$direct]))
						{
							$category = new CruiseCruiseCategory();
							$category 
								->setCode(Helper\Convert::translit($direct))
								->setTitle($direct)
							;
							$em->persist($category);
							$categoryCruisesAll[$direct] = $category;
						}
						$categoriesToAdd->add($categoryCruisesAll[$direct]);
					}
					
					$cruise = $ship->addCruise($code,$categoriesToAdd);

					$cruise->setCode($cruiseSpec[$code]);
					$cruise->setShip($ship);
					$cruise->setRoute($route);
					$cruise->setStartDate($startDate);
					$cruise->setEndDate($endDate);
					$cruise->setRoute($route);
					$cruise->setDayCount($dayCount);
					$cruise->setDescription("");
					$cruise->setTurOperator("vodohod");
					


					
					$em->persist($cruise);	
					
					// стоянки
					
					$program_item_url = "http://cruises.vodohod.com/agency/json-days.htm?pauth=jnrehASKDLJcdakljdx&cruise=".$code;
					$program_item_json = $this->curl_get_file_contents($program_item_url);
					$program_items_v = json_decode($program_item_json,true);
					foreach($program_items_v as $program_item_v)
					{
						$cruise_program_item = new CruiseCruiseProgramItem();
						$date_item_start = strtotime( date("d-m-Y ",$startDate+($program_item_v['day']-1)*60*60*24).$program_item_v['time_start']);//($program_item_v['day']-1);
						$date_item_stop = strtotime( date("d-m-Y ",$startDate+($program_item_v['day']-1)*60*60*24).$program_item_v['time_stop']);//($program_item_v['day']-1);
						$cruise_program_item
									
									->setCruise($cruise)
									->setPlace($places[$program_item_v['port']])
									->setOrd(500)
									->setDate($date_item_start)
									->setDateStop($date_item_stop)
									->setDescription(nl2br($program_item_v['excursion']))
									->setPlacetitle($program_item_v['port'])
									
						;	
						$em->persist($cruise_program_item);
					}
				}
			}
			
			$em->persist($ship); 
			$em->flush();
			
			foreach ($ship->getCruises() as $cruise)
			{
				$code = $cruise->getCode()->getCode();
				
				$url_prices  = "http://cruises.vodohod.com/agency/json-prices.htm?pauth=jnrehASKDLJcdakljdx&cruise=".$code;
				
				$prices_json = $this->curl_get_file_contents($url_prices);
				
				$prices_v = json_decode($prices_json,true);
				
				

				
				
				
				
				foreach($prices_v['tariffs'] as $p_t)
				{
					
					//$cruiseTariff = $tariffs[$p_t['tariff_name']];
					
					if(isset($tariffs[$p_t['tariff_name']]))
					{
						$cruiseTariff = $tariffs[$p_t['tariff_name']];
					}
					else
					{
						$cruiseTariff = new CruiseTariff();
						$cruiseTariff
							->setName($p_t['tariff_name'])
							;
						$em->persist($cruiseTariff);
						$em->flush();
						$tariffs[$p_t['tariff_name']] = $cruiseTariff; 
					}
					
					
					// сделать проверку на существование тарифа, если нет, то дописать в базу его
					
					
					foreach($p_t['prices'] as $key => $prices)
					{
						$deck = $decks[$prices['deck_name']];
						$rt_name = $room_types[$prices['rt_name']];
						$rp_id = $room_places[$prices['rp_name']];
						$price_value = $prices['price_value'];
						
						if($price_value <= 0) continue;

						// запишем это всё в price
						
						
						$price = new CruiseShipCabinCruisePrice();
						
							if(isset($cabins[$rt_name->getRtId()][$deck->getDeckId()]))
							{
								$cabin = $cabins[$rt_name->getRtId()][$deck->getDeckId()];
							}
							else 
							{
								continue;
							}	
						

						
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
			
			
			$em->flush(); 
			
			
		}
		
		return array('ship' => $shipName );
	}	
	
}