<?php

namespace Robotiks\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('RobotiksFrontendBundle:Main:index.html.twig', array(
            // ...
        ));
    }

}
