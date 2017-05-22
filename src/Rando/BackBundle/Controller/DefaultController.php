<?php

namespace Rando\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RandoBackBundle:Default:index.html.twig');
    }
}
