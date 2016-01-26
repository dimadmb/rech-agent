<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DocumentController extends Controller
{
	public function indexAction() {		
		return $this->pageAction("index");
	}

	public function pageAction($first, $second = null, $name = null) {
		$repos = $this->getRepository("Document");
		if ($second == null) {
			$url = "/" . $first;
		} else {
			$url = "/$first/$second/$name";
		}
		$doc = $repos->findOneByUrl($url);
		if ($doc == null) {
			throw new Exception\HttpException("Страница $url.html не найдена.", 404);
		}
		if ($first == "index" && $second == null) {
			return $this->render('BaseBundle:Document:index', array("document" => $doc));
		} else {
			return $this->render('BaseBundle:Document:page', array("document" => $doc));
		}
	}
	
}
