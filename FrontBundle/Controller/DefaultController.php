<?php

namespace Tuni\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TuniFrontBundle:Default:index.html.twig', array('name' => $name));
    }
}
