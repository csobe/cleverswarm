<?php

namespace CleverSwarm\BackendBundle\Controller;

use CleverSwarm\BackendBundle\Entity\Slide;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Slide controller.
 *
 */
class SlideController extends Controller
{
    /**
     * Lists all slide entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $slides = $em->getRepository('CleverSwarmBackendBundle:Slide')->findAll();

        return $this->render('CleverSwarmBackendBundle:Slide:index.html.twig', array(
            'slides' => $slides,
        ));
    }

    /**
     * Creates a new slide entity.
     *
     */
    public function newAction(Request $request)
    {
        $slide = new Slide();
        $form = $this->createForm('CleverSwarm\BackendBundle\Form\SlideType', $slide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($slide);
            $em->flush($slide);

            return $this->redirectToRoute('cleverswarm_backend_slide_show', array('id' => $slide->getId()));
        }

        return $this->render('CleverSwarmBackendBundle:Slide:new.html.twig', array(
            'slide' => $slide,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a slide entity.
     *
     */
    public function showAction(Slide $slide)
    {
        $deleteForm = $this->createDeleteForm($slide);

        return $this->render('CleverSwarmBackendBundle:Slide:show.html.twig', array(
            'slide' => $slide,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing slide entity.
     *
     */
    public function editAction(Request $request, Slide $slide)
    {
        $deleteForm = $this->createDeleteForm($slide);
        $editForm = $this->createForm('CleverSwarm\BackendBundle\Form\SlideType', $slide);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cleverswarm_backend_slide_edit', array('id' => $slide->getId()));
        }

        return $this->render('CleverSwarmBackendBundle:Slide:edit.html.twig', array(
            'slide' => $slide,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a slide entity.
     *
     */
    public function deleteAction(Request $request, Slide $slide)
    {
        $form = $this->createDeleteForm($slide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($slide);
            $em->flush($slide);
        }

        return $this->redirectToRoute('cleverswarm_backend_slide_index');
    }

    /**
     * Creates a form to delete a slide entity.
     *
     * @param Slide $slide The slide entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Slide $slide)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cleverswarm_backend_slide_delete', array('id' => $slide->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
