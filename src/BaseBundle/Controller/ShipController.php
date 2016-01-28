<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

 /**
 * @Route("/")
 */


class ShipController extends Controller
{

    /**
	 * @Template()
     */
	
	public function classlistAction()
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:CruiseShipClass');
		$classes = $repository->findAll();
		return  array('classes' => $classes);
	}	
	
	
}
