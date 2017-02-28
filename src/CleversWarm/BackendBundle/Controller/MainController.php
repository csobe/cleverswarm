<?php

namespace CleversWarm\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('CleversWarmBackendBundle:Main:index.html.twig', array(
            // ...
        ));
    }

}
