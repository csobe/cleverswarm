<?php

namespace CleversWarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CleversWarmBackendBundle:Post')->findAll();
        
        return $this->render('CleversWarmFrontendBundle:Main:index.html.twig', array(
            'posts' => $posts,
        ));
    }

}
