<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\HttpFoundation\Request;

use BaseBundle\Controller\Helper\ImageResizer;

class PhotoController extends Controller
{
 	const FILE_PATH = "/web/bundles/base/files";
	const THUMB_PATH = "/web/bundles/base/files/_thumb";
	const NO_IMG_URL = "/web/bundles/base/images/empty.gif";
	const DS = DIRECTORY_SEPARATOR;
	
	/**
	 * @Template()
     */		
	public function getPhotosAction($doc_id,$path, Request $request)
	{
		$repository = $this->getDoctrine()->getRepository('BaseBundle:Photo');
		$photos = $repository->findByDocument($doc_id);
		
		foreach($photos as $photo)
		{	
			$ir = new ImageResizer();
			$photo->setPreview( '//'.$request->server->get('SERVER_NAME').self::THUMB_PATH.$path.self::DS.
				$ir->resizeImage($request->server->get('DOCUMENT_ROOT').self::FILE_PATH.$path.self::DS.$photo->getFilename(),
				$request->server->get('DOCUMENT_ROOT').self::THUMB_PATH.$path.self::DS,
				400,300) 
			) 
				;
				
			$photo->setUrl('//'.$request->server->get('SERVER_NAME').self::FILE_PATH.$path.self::DS.$photo->getFilename());	
		}
		
		return array('photos'=>$photos);
		
	}

	/**
	* Вывод фоток на лету
	* @Route("/image", name="image_resize" )
	*/
	public function imageAction()
	{
		$ir = new ImageResizer();
		$request = Request::createFromGlobals();
		$path = $request->query-> get ('path');
		return $ir->resizeImage(
			$request->server->get('DOCUMENT_ROOT').'/web/'.$path,
			null,
			450,
			260
		);
	}
	

	
}
