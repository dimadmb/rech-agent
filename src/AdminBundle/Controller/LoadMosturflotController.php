<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\Common\Collections\ArrayCollection;


class LoadMosturflotController extends Controller
{
	
		
	/**
	 * @Template()
	 * @Route("/admin/getshipsmosturflot", name="getshipsmosturflot" )
     */			
	public function getShipsAction()
	{
		$load = $this->get('admin.loadshipmosturflot');
		
		return array("ships" => $load->getShips());
	}	
	
	
	/**
	 * @Template()
	 * @Route("/admin/loadshipmosturflot/{ship_id}", name="loadshipmosturflot" )
     */		
	public function loadShipAction($ship_id)
	{
		$load = $this->get('admin.loadshipmosturflot');
		
		return array( "return" => $load->loadShip($ship_id)); 
	}
	
}