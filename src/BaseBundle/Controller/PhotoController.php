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
			if(!file_exists($request->server->get('DOCUMENT_ROOT').self::THUMB_PATH.$path.self::DS.$photo->getFilename()) )
			{
				$ir = new ImageResizer();
				$photo->setPreview( '//'.$request->server->get('SERVER_NAME').self::THUMB_PATH.$path.self::DS.
					$ir->resizeImage($request->server->get('DOCUMENT_ROOT').self::FILE_PATH.$path.self::DS.$photo->getFilename(),
					$request->server->get('DOCUMENT_ROOT').self::THUMB_PATH.$path.self::DS,
					400,300) 
				) 
				;	
			}
			else
			{
				$photo->setPreview('//'.$request->server->get('SERVER_NAME').self::THUMB_PATH.$path.self::DS.$photo->getFilename());
			}


				
			$photo->setUrl('//'.$request->server->get('SERVER_NAME').self::FILE_PATH.$path.self::DS.$photo->getFilename());	
		}
		
		return array('photos'=>$photos);
		
	}
//  /bundles/base/files/cruise/ship/aleksandr-benua/aleksandr-benua-main.jpg
	/**
	* Вывод фоток на лету
	* @Route("/images/ship/{ship_name}/{ship_image}", name="image_resizer" )
	*/
	public function imageAction($ship_name, $ship_image)
	{
		
		$initial_path = "/bundles/base/files/cruise/ship/"; //aleksandr-benua/aleksandr-benua-main.jpg
		
		$ir = new ImageResizer();
		$request = Request::createFromGlobals();
		$path = $request->query-> get ('path');
		return $ir->resizeImage(
			$request->server->get('DOCUMENT_ROOT').'/web'.$initial_path.$ship_name.'/'.$ship_image,
			$request->server->get('DOCUMENT_ROOT').'/web/images/ship/'.$ship_name.'/',

			450,
			260
		);
	}
	

	
}
