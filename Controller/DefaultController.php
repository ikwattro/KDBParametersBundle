<?php

namespace KDB\ParametersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use KDB\ParametersBundle\Form\ParameterFormType;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        //Create the params form
        $class = $this->container->getParameter('kdb_parameters.class');
        $param = new $class;
        
        $form = $this->createForm(new ParameterFormType($class), $param);
        
        return $this->render('KDBParametersBundle:Default:index.html.twig', array('name' => $name, 'form' => $form->createView()));
    }
}
