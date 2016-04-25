<?php

namespace MailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/mail/show/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
	
    /**
     * @Route("/mail/send/{name}/{mail}")
     */
    public function sendAction($name,$mail)
    {
			$mailer = $this->get('mailer');
			

			
			
			$body = $this->render('MailBundle:Default:index.html.twig',array()); 
			
			$message = \Swift_Message::newInstance()
				->setSubject('Заказ')
				->setFrom(array('test-rech-agent@yandex.ru'=>'Речное агентство'))
				->setTo(array('dkochetkov@vodohod.ru',$mail))

				->setBody($body, 'text/html')
			;
			$mailer->send($message);

		return new Response('OK');
    }	
	
}
