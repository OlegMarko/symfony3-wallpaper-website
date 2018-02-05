<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GalleryController extends Controller
{
    /**
     * Get gallery.
     *
     * @Route("/gallery", name="gallery")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $images = [
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-106606.jpeg',
            'pexels-photo-840698.jpeg'
        ];

        $paginator  = $this->get('knp_paginator');
        $data['images'] = $paginator->paginate(
            $images,
            $request->query->getInt('page', 1),
            4
        );

        return $this->render('gallery/index.html.twig', $data);
    }
}
