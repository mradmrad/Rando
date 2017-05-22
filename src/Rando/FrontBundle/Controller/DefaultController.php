<?php

namespace Rando\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        
        
        return $this->render('RandoFrontBundle:Default:index.html.twig');
    }
    public function missionAction()
    {
        return $this->render('RandoFrontBundle:Default:mission.html.twig');
    }
    public function organisationAction()
    {
        return $this->render('RandoFrontBundle:Default:organisation.html.twig');
    }
    public function randonneeAction()
    {
        return $this->render('RandoFrontBundle:Default:randonnee.html.twig');
    }
    public function detailAction()
    {
        return $this->render('RandoFrontBundle:Default:detail_randonne.html.twig');
    }
    public function profileAction()
    {
        return $this->render('RandoFrontBundle:Default:profile.html.twig');
    }
    public function reclamationsAction()
    {
        return $this->render('RandoFrontBundle:Default:reclamations.html.twig');
    }
    public function achatsAction()
    {
        return $this->render('RandoFrontBundle:Default:achats.html.twig');
    }
    public function participationsAction()
    {
        return $this->render('RandoFrontBundle:Default:participations.html.twig');
    }
    public function produitsAction()
    {
        return $this->render('RandoFrontBundle:Default:produits.html.twig');
    }
    public function checkoutAction()
    {
        return $this->render('RandoFrontBundle:Default:checkout.html.twig');
    }
    public function contactAction()
    {
        return $this->render('RandoFrontBundle:Default:contact.html.twig');
    }
}
