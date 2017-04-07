<?php

namespace CleverSwarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CleverSwarmBackendBundle:Post')->findAll();

        return $this->render('CleverSwarmFrontendBundle:Post:index.html.twig', array(
            'posts' => $posts,
        ));
    }

    public function showAction(\CleverSwarm\BackendBundle\Entity\Post $post)
    {
        return $this->render('CleverSwarmFrontendBundle:Post:show.html.twig', array(
            'post' => $post,
        ));
    }

    public function sidebarAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('CleverSwarmBackendBundle:Category')->findAll();

        return $this->render('CleverSwarmFrontendBundle:Partial:_sidebar.html.twig', array(
            'categories' => $categories,
        ));
    }    

}
