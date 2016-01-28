<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
 /**
 * @Route("/")
 */

class DocumentController extends Controller
{
	public function indexAction() {		
		return $this->pageAction("index");
	}
	
	public function pageAction($first, $second = null, $name = null) {
		$repository = $this->getDoctrine()->getRepository('BaseBundle:Document');
		if ($second == null) {
			$url = "/" . $first;
		} else {
			$url = "/$first/$second/$name";
		}
		$doc = $repository->findOneByUrl($url);
		if ($doc == null) {
			throw new Exception\HttpException("Страница $url.html не найдена.", 404);
		}
		if ($first == "index" && $second == null) {
			return $this->render('BaseBundle:Document:index.html.twig', array("document" => $doc));
		} else {
			return $this->render('BaseBundle:Document:page.html.twig', array("document" => $doc));
		}
	}	
	
}