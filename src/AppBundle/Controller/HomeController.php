<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $img_array_1 = [
            "pexels-photo-106606.jpeg",
            "pexels-photo-389818.jpeg",
            "pexels-photo-399636.jpeg",
        ];

        $img_array_2 = [
            "pexels-photo-449500.jpeg",
            "pexels-photo-840698.jpeg",
            "pexels-photo-845225.jpeg"
        ];

        $img_array_3 = [
            "pexels-photo-458264.jpg",
            "pexels-photo-131743.jpeg",
            "pexels-photo-641130.jpeg"
        ];

        $images = array_merge($img_array_1, $img_array_2, $img_array_3);
        shuffle($images);

        $data['randomisedImages'] = array_slice($images, 0, 8);
        $data['imgArray1'] = array_slice($img_array_1, 0, 2);
        $data['imgArray2'] = array_slice($img_array_2, 0, 2);
        $data['imgArray3'] = array_slice($img_array_3, 0, 2);

        return $this->render('home/index.html.twig', $data);
    }
}