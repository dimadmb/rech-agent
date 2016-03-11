<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\Common\Collections\ArrayCollection;

use BaseBundle\Controller\Helper as Helper;

use Liuggio\ExcelBundle;

use BaseBundle\Entity\CruiseCruise;
use BaseBundle\Entity\CruiseShip;



class AdminController extends Controller
{
	const SHIP = "ship";
	const PRICES = "price";
	const CRUISE = "marsh";
	const PROGRAM = "prog";
	
	const PATH_IMG = "/bundles/cruise/ship/";
	
	protected $errorMessages = array(
	self::SHIP => "Страница 'ship' не найдена",
	self::PRICES => "Страница 'price' не найдена",
	self::CRUISE => "Страница 'marsh' не найдена",
	self::PROGRAM => "Страница 'prog' не найдена",
	);

	
	public function isValid($phpExcelObject) {
		$pages = array(self::SHIP, self::PRICES, self::CRUISE, self::PROGRAM);
		foreach ($pages as $page) {
			if ($phpExcelObject->sheetNameExists($page)) {
				unset($this->errorMessages[$page]);
			}
		}
		return $this->errorMessages;
	}	

	
    /**
	 * @Template()
	 * @Route("/admin", name="admin" )
     */			
	public function indexAction()
	{
		
		//$directory = $this->container->getParameter('kernel.root_dir').'/../web';
		
		$f = '';
		
		if (isset($_FILES['form'])){
		$file =  $_FILES['form']['tmp_name']['file'];
		$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($file);
		
		
		$f = $parser = $this->getShip($phpExcelObject);
		
		//$f = get_class_methods($phpExcelObject->getSheetByName(self::SHIP)->getCell('A2'));
		
		}
		
		
					
		$form_excel = $this->createFormBuilder()
			->add('file','file',array('label' => 'файл'))
			->add('button', 'submit',array('label' => 'Загрузить'))
			->getForm(); 
			
		return array('form_excel' => $form_excel->createView(),'form'=>$f);
	}
	
	private function getShip($phpExcelObject)
	{
		if(sizeof($this->isValid($phpExcelObject)) == 0 )
			{
				
			// парсим лист с теплоходом

			$em = $this->getDoctrine()->getManager();
			
			$shipRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShip');
			$classRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipClass');
			
			$sheetShip = $phpExcelObject->getSheetByName(self::SHIP);
			
			$shipName = $sheetShip->getCell('A2')->getValue();
			$shipCode = Helper\Convert::translit($sheetShip->getCell('A2')->getValue());
			$classId = (int)$sheetShip->getCell('B2')->getCalculatedValue();
			$class = $classRepos->find($classId);
			
			$ship = $shipRepos->findOneByCode($shipCode);
			
			if ($ship != null) {
				$em->remove($ship);
				//FIXME: remove after Doctrine fix
				$em->flush();
			}
			
			$ship = new CruiseShip();
			
			$ship->setImgurl(self::PATH_IMG.$shipCode.'.jpg');
			$ship->setCode($shipCode);
			$ship->setTitle($shipName);
			$ship->setClass($class);
			$ship->setProperties('');
			for ($i = 2; $i <= $sheetShip->getHighestRow(); $i++) 
			{
				$propertyName = $sheetShip->getCellByColumnAndRow(2, $i)->getValue();
				if (trim($propertyName) == "") continue;
				$propertyValue = $sheetShip->getCellByColumnAndRow(3, $i)->getValue();
				$ship->addProperty($propertyName, $propertyValue);
			}
			//$f = $ship;
			
			$cruiseRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
			$sheetCruise = $phpExcelObject->getSheetByName(self::CRUISE);
			$categoryRepos = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruiseCategory');
		
			for ($i = 2; $i <= $sheetCruise->getHighestRow(); $i++) 
			{
				$code = Helper\Convert::translit($sheetCruise->getCellByColumnAndRow(0, $i)->getValue());
				if ($code == "") continue;	
				
				//$f[] = get_class_methods($sheetCruise->getCellByColumnAndRow(1, $i));
				
				$route = $sheetCruise->getCellByColumnAndRow(3, $i)->getValue();
				$startDate = \PHPExcel_Shared_Date::ExcelToPHP($sheetCruise->getCellByColumnAndRow(1, $i)->getValue()); 
				$endDate = \PHPExcel_Shared_Date::ExcelToPHP($sheetCruise->getCellByColumnAndRow(2, $i)->getValue());
				$dayCount = $sheetCruise->getCellByColumnAndRow(4, $i)->getValue(); 
				$categoryIds =  $sheetCruise->getCellByColumnAndRow(5, $i)->getValue();
				$burningcruise = trim($sheetCruise->getCellByColumnAndRow(6, $i)->getValue()) == 1 ? 1 : 0;
				$reductionprice = trim($sheetCruise->getCellByColumnAndRow(7, $i)->getValue()) == 1 ? 1 : 0;
				$specialOffer = trim($sheetCruise->getCellByColumnAndRow(8, $i)->getValue()) == 1 ? 1 : 0;
				
				$categoriesToAdd = new ArrayCollection();
				
				foreach (explode(",", $categoryIds) as $catId) {
					$category = $categoryRepos->findOneById(Helper\Convert::translit($catId));
					if ($category == null) {
						$this->errorMessages[] = "Не найдена категория $catId. Возможно они не были импортированы.";
						//return null;
					}
					$categoriesToAdd->add($category);
				}
				
				$cruise = $ship->addCruise($code, $categoriesToAdd);
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
				$f[] = $cruise;
				
			}
			
			
			$em->persist($ship);
			
			
			$sheetPrices = $phpExcelObject->getSheetByName(self::PRICES);
			for($col=1 ; $col < \PHPExcel_Cell::columnIndexFromString($sheetPrices->getHighestColumn());$col++)
			{
				
				$cabinTitle = $sheetPrices->getCellByColumnAndRow($col, 1)->getValue();
				$cabinDescr = $sheetPrices->getCellByColumnAndRow($col, 2)->getValue();
				if (trim($cabinTitle) == '') 
				{
					continue;
				}
				
				$cabin = $ship->addCabin($cabinTitle);
				$cabin->setDescription($cabinDescr);
				foreach ($ship->getCruises() as $cruise) {
					
					for($row=3; $row<=$sheetPrices->getHighestRow(); $row++) {
						
						$f[] = $cruiseCode = (int)$sheetPrices->getCellByColumnAndRow(0, $row)->getValue();
						if ( $cruiseCode == $cruise->getCode()) {
							$f[] = 1;
							$cabinPrice = $sheetPrices->getCellByColumnAndRow($col, $row)->getValue();
							if (!is_numeric($cabinPrice)) {
								$cabinPrice = 0;
							}
							$f[] = $price = $cabin->setPrice($cruise, $cabinPrice);
							$em->persist($price);
							
						}
					}
				}
				$em->persist($cabin);
				
			}
			
			$em->flush();
			
			}
			else
			{
				$f = $this->errorMessages;
			}	
			
			return array('f'=>$f, 'ship'=>$ship);
	
	}
}
