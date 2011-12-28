<?php

namespace KDB\ParametersBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use KDB\ParametersBundle\Form\ParameterFormType;


class DefaultController extends ContainerAware
{
    
    public function indexAction()
    {
        //Create the params form
        $class = $this->container->getParameter('kdb_parameters.class');
        $param = new $class;
        
        $form = $this->container->get('form.factory')->create(new ParameterFormType($class), $param, array());
        
        return $this->container->get('templating')->renderResponse('KDBParametersBundle:Default:index.html.twig',array(
            'form' => $form->createView(),
        ));
        
        //return $this->render('KDBParametersBundle:Default:index.html.twig', array('name' => $name, 'form' => $form->createView()));
    }
}
