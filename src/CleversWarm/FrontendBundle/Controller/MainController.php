<?php

namespace CleverSwarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CleverSwarmBackendBundle:Post')->findAll();
        
        return $this->render('CleverSwarmFrontendBundle:Main:index.html.twig', array(
            'posts' => $posts,
        ));
    }

}
