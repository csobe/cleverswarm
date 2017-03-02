<?php

namespace CleversWarm\BackendBundle\Controller;

use CleversWarm\BackendBundle\Entity\Remote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Remote controller.
 *
 */
class RemoteController extends Controller
{
    /**
     * Lists all remote entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $remotes = $em->getRepository('CleversWarmBackendBundle:Remote')->findAll();

        return $this->render('CleversWarmBackendBundle:Remote:index.html.twig', array(
            'remotes' => $remotes,
        ));
    }

    /**
     * Creates a new remote entity.
     *
     */
    public function newAction(Request $request)
    {
        $remote = new Remote();
        $form = $this->createForm('CleversWarm\BackendBundle\Form\RemoteType', $remote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $remote->setUser($this->container->get('security.token_storage')->getToken()->getUser());
            $em->persist($remote);
            $em->flush($remote);

            return $this->redirectToRoute('cleverswarm_backend_remote_show', array('id' => $remote->getId()));
        }

        return $this->render('CleversWarmBackendBundle:Remote:new.html.twig', array(
            'remote' => $remote,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a remote entity.
     *
     */
    public function showAction(Remote $remote)
    {
        $deleteForm = $this->createDeleteForm($remote);

        return $this->render('CleversWarmBackendBundle:Remote:show.html.twig', array(
            'remote' => $remote,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing remote entity.
     *
     */
    public function editAction(Request $request, Remote $remote)
    {
        $deleteForm = $this->createDeleteForm($remote);
        $editForm = $this->createForm('CleversWarm\BackendBundle\Form\RemoteType', $remote);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cleverswarm_backend_remote_edit', array('id' => $remote->getId()));
        }

        return $this->render('CleversWarmBackendBundle:Remote:edit.html.twig', array(
            'remote' => $remote,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a remote entity.
     *
     */
    public function deleteAction(Request $request, Remote $remote)
    {
        $form = $this->createDeleteForm($remote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($remote);
            $em->flush($remote);
        }

        return $this->redirectToRoute('cleverswarm_backend_remote_index');
    }

    /**
     * Creates a form to delete a remote entity.
     *
     * @param Remote $remote The remote entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Remote $remote)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cleverswarm_backend_remote_delete', array('id' => $remote->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
