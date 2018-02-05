<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DetailController extends Controller
{
    /**
     * Show image.
     *
     * @Route("/view", name="view")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $data['image'] = 'pexels-photo-106606.jpeg';

        return $this->render('detail/index.html.twig', $data);
    }
}