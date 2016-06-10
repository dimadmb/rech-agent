<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use BaseBundle\Controller\Helper as Helper;

class ZayavkaSendAjaxController extends Controller
{
	/**
	* @Template()
	* @Route("/ajax/zayavka_send", name="ajax_zayavka_send" )
    */	
	public function indexAction(Request $request)
	{
		$mailer = $this->get('mailer');

		$code = $request->request->get("code");
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseCruise');
		$cruise  = $repository->findOneByCode($code);
		$cruise  = Helper\PrepareCruiseRow::prepare($cruise);		
		
		$body = $this->render("BaseBundle:Cruise:modal-zayavka-send-mail.html.twig" , 
		array(
			"name"=>$request->request->get("name"), 
			"cruise" => $cruise,
			"phone"=>$request->request->get("phone"), 
			"email"=>$request->request->get("email"), 
			"comment"=>$request->request->get("comment"), 
			
		));
		
			$message = \Swift_Message::newInstance()
				->setSubject('Заказ')
				->setFrom(array('test-rech-agent@yandex.ru'=>'Речное агентство'))
				->setTo(array('dkochetkov@vodohod.ru','12nas24@mail.ru',"info@rech-agent.ru"))
				->setBody($body->getContent(),'text/html')
			;
			$mailer->send($message);
		
		return array('answer'=>$body->getContent());  
		
	}

	
	
	
}
