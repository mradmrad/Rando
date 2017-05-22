<?php

namespace Rando\BackBundle\Controller;

use Rando\BackBundle\Entity\gallerieEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gallerieevent controller.
 *
 */
class gallerieEventController extends Controller
{
    /**
     * Lists all gallerieEvent entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gallerieEvents = $em->getRepository('RandoBackBundle:gallerieEvent')->findAll();

        return $this->render('gallerieevent/index.html.twig', array(
            'gallerieEvents' => $gallerieEvents,
        ));
    }

    /**
     * Creates a new gallerieEvent entity.
     *
     */
    public function newAction(Request $request)
    {
        $gallerieEvent = new Gallerieevent();
        $form = $this->createForm('Rando\BackBundle\Form\gallerieEventType', $gallerieEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallerieEvent);
            $em->flush();

            return $this->redirectToRoute('gallerieevent_show', array('id' => $gallerieEvent->getId()));
        }

        return $this->render('gallerieevent/new.html.twig', array(
            'gallerieEvent' => $gallerieEvent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gallerieEvent entity.
     *
     */
    public function showAction(gallerieEvent $gallerieEvent)
    {
        $deleteForm = $this->createDeleteForm($gallerieEvent);

        return $this->render('gallerieevent/show.html.twig', array(
            'gallerieEvent' => $gallerieEvent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gallerieEvent entity.
     *
     */
    public function editAction(Request $request, gallerieEvent $gallerieEvent)
    {
        $deleteForm = $this->createDeleteForm($gallerieEvent);
        $editForm = $this->createForm('Rando\BackBundle\Form\gallerieEventType', $gallerieEvent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallerieevent_edit', array('id' => $gallerieEvent->getId()));
        }

        return $this->render('gallerieevent/edit.html.twig', array(
            'gallerieEvent' => $gallerieEvent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gallerieEvent entity.
     *
     */
    public function deleteAction(Request $request, gallerieEvent $gallerieEvent)
    {
        $form = $this->createDeleteForm($gallerieEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gallerieEvent);
            $em->flush();
        }

        return $this->redirectToRoute('gallerieevent_index');
    }

    /**
     * Creates a form to delete a gallerieEvent entity.
     *
     * @param gallerieEvent $gallerieEvent The gallerieEvent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(gallerieEvent $gallerieEvent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallerieevent_delete', array('id' => $gallerieEvent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
