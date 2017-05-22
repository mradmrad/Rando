<?php

namespace Rando\BackBundle\Controller;

use Rando\BackBundle\Entity\Destination;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Destination controller.
 *
 */
class DestinationController extends Controller
{
    /**
     * Lists all destination entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $destinations = $em->getRepository('RandoBackBundle:Destination')->findAll();

        return $this->render('RandoBackBundle:destination:index.html.twig', array(
            'destinations' => $destinations,
        ));
    }

    /**
     * Creates a new destination entity.
     *
     */
    public function newAction(Request $request)
    {
        $destination = new Destination();
        $form = $this->createForm('Rando\BackBundle\Form\DestinationType', $destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($destination);
            $em->flush();

            return $this->redirectToRoute('destination_show', array('id' => $destination->getId()));
        }

        return $this->render('RandoBackBundle:destination:new.html.twig', array(
            'destination' => $destination,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a destination entity.
     *
     */
    public function showAction(Destination $destination)
    {
        $deleteForm = $this->createDeleteForm($destination);

        return $this->render('RandoBackBundle:destination:show.html.twig', array(
            'destination' => $destination,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing destination entity.
     *
     */
    public function editAction(Request $request, Destination $destination)
    {
        $deleteForm = $this->createDeleteForm($destination);
        $editForm = $this->createForm('Rando\BackBundle\Form\DestinationType', $destination);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('destination_edit', array('id' => $destination->getId()));
        }

        return $this->render('RandoBackBundle:destination:edit.html.twig', array(
            'destination' => $destination,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a destination entity.
     *
     */
    public function deleteAction(Request $request, Destination $destination)
    {
        $form = $this->createDeleteForm($destination);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($destination);
            $em->flush();
        }

        return $this->redirectToRoute('destination_index');
    }

    /**
     * Creates a form to delete a destination entity.
     *
     * @param Destination $destination The destination entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Destination $destination)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('destination_delete', array('id' => $destination->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
