<?php

namespace CleversWarm\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('CleversWarmBackendBundle:Post')->findAll();

        return $this->render('CleversWarmFrontendBundle:Post:index.html.twig', array(
            'posts' => $posts,
        ));
    }

    public function showAction(\CleversWarm\BackendBundle\Entity\Post $post)
    {
        return $this->render('CleversWarmFrontendBundle:Post:show.html.twig', array(
            'post' => $post,
        ));
    }

}
