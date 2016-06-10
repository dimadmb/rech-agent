<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Doctrine\Common\Collections\ArrayCollection;


class LoadInfoflotController extends Controller
{
	
		
	/**
	 * @Template()
	 * @Route("/admin/getshipsinfoflot", name="getshipsinfoflot" )
     */			
	public function getShipsAction()
	{
		$load = $this->get('admin.loadshipinfoflot');
		
		return array("ships" => $load->getShips());
	}	
	
	
	/**
	 * @Template()
	 * @Route("/admin/loadshipinfoflot/{ship_id}", name="loadshipinfoflot" )
     */		
	public function loadShipAction($ship_id)
	{
		$load = $this->get('admin.loadshipinfoflot');
		
		return $load->loadShip($ship_id); 
	}
	
}