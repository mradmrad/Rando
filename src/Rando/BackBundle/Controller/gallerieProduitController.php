<?php

namespace Rando\BackBundle\Controller;

use Rando\BackBundle\Entity\gallerieProduit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gallerieproduit controller.
 *
 */
class gallerieProduitController extends Controller
{
    /**
     * Lists all gallerieProduit entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gallerieProduits = $em->getRepository('RandoBackBundle:gallerieProduit')->findAll();

        return $this->render('gallerieproduit/index.html.twig', array(
            'gallerieProduits' => $gallerieProduits,
        ));
    }

    /**
     * Creates a new gallerieProduit entity.
     *
     */
    public function newAction(Request $request)
    {
        $gallerieProduit = new Gallerieproduit();
        $form = $this->createForm('Rando\BackBundle\Form\gallerieProduitType', $gallerieProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallerieProduit);
            $em->flush();

            return $this->redirectToRoute('gallerieproduit_show', array('id' => $gallerieProduit->getId()));
        }

        return $this->render('gallerieproduit/new.html.twig', array(
            'gallerieProduit' => $gallerieProduit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gallerieProduit entity.
     *
     */
    public function showAction(gallerieProduit $gallerieProduit)
    {
        $deleteForm = $this->createDeleteForm($gallerieProduit);

        return $this->render('gallerieproduit/show.html.twig', array(
            'gallerieProduit' => $gallerieProduit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gallerieProduit entity.
     *
     */
    public function editAction(Request $request, gallerieProduit $gallerieProduit)
    {
        $deleteForm = $this->createDeleteForm($gallerieProduit);
        $editForm = $this->createForm('Rando\BackBundle\Form\gallerieProduitType', $gallerieProduit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallerieproduit_edit', array('id' => $gallerieProduit->getId()));
        }

        return $this->render('gallerieproduit/edit.html.twig', array(
            'gallerieProduit' => $gallerieProduit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gallerieProduit entity.
     *
     */
    public function deleteAction(Request $request, gallerieProduit $gallerieProduit)
    {
        $form = $this->createDeleteForm($gallerieProduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gallerieProduit);
            $em->flush();
        }

        return $this->redirectToRoute('gallerieproduit_index');
    }

    /**
     * Creates a form to delete a gallerieProduit entity.
     *
     * @param gallerieProduit $gallerieProduit The gallerieProduit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(gallerieProduit $gallerieProduit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallerieproduit_delete', array('id' => $gallerieProduit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
