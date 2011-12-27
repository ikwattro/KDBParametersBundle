<?php

namespace KDB\ParametersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('KDBParametersBundle:Default:index.html.twig', array('name' => $name));
    }
}
