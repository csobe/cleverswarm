<?php

namespace CleversWarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemoteController extends Controller
{
    public function indexAction()
    {
        return $this->render('CleversWarmFrontendBundle:Remote:index.html.twig', array(
            // ...
        ));
    }

    public function viewAction()
    {
        return $this->render('CleversWarmFrontendBundle:Remote:view.html.twig', array(
            // ...
        ));
    }

}
