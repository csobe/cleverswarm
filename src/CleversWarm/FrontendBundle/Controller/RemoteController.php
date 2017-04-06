<?php

namespace CleverSwarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemoteController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $remotes = $em->getRepository('CleverSwarmBackendBundle:Remote')->findAll();

        return $this->render('CleverSwarmFrontendBundle:Remote:index.html.twig', array(
            'remotes' => $remotes,
        ));
    }

    public function showAction(\CleverSwarm\BackendBundle\Entity\Remote $remote)
    {
        return $this->render('CleverSwarmFrontendBundle:Remote:show.html.twig', array(
            'remote' => $remote,
        ));
    }

}
