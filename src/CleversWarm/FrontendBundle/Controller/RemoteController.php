<?php

namespace CleversWarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemoteController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $remotes = $em->getRepository('CleversWarmBackendBundle:Remote')->findAll();

        return $this->render('CleversWarmFrontendBundle:Remote:index.html.twig', array(
            'remotes' => $remotes,
        ));
    }

    public function showAction(\CleversWarm\BackendBundle\Entity\Remote $remote)
    {
        return $this->render('CleversWarmFrontendBundle:Remote:show.html.twig', array(
            'remote' => $remote,
        ));
    }

}
