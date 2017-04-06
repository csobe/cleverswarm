<?php

namespace CleverSwarm\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('CleverSwarmBackendBundle:Main:index.html.twig', array(
            // ...
        ));
    }

}
