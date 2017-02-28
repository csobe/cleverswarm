<?php

namespace CleversWarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('CleversWarmFrontendBundle:Main:index.html.twig', array(
            // ...
        ));
    }

}
