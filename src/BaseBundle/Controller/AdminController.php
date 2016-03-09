<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\File\UploadedFile;


use Liuggio\ExcelBundle;

class AdminController extends Controller
{
	
    /**
	 * @Template()
	 * @Route("/admin", name="admin" )
     */			
	public function indexAction()
	{
		$request = $this->getRequest();
		
		//$directory = $this->container->getParameter('kernel.root_dir').'/../web';
		
		$f = '';
		
		if (isset($_FILES['form'])){
		
		
		$file =  $_FILES['form']['tmp_name']['file'];
		
		
		$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject($file);
		
		$f = get_class_methods($phpExcelObject);
		//$f = $phpExcelObject->getCell('A1');
		$phpExcelObject->setActiveSheetIndexByName('price');
		$f = $phpExcelObject->getActiveSheet()->getCell('A1')    ->getValue();//->getPlainText();
		
		};
		
		
		$form_excel = $this->createFormBuilder()
			->add('file','file',array('label' => 'файл'))
			->add('button', 'submit',array('label' => 'Загрузить'))
			->getForm(); 
			
		return array('form_excel' => $form_excel->createView(),'form'=>$f);
	}
}
