<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use KDB\ParametersBundle\Form\ParameterFormType;

/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

class DefaultController extends ContainerAware
{
    
    /**
     *
     * List all parameters available
     */
    public function indexAction()
    {        
        $manager = $this->container->get('kdb_parameters.manager');
        echo count($manager->findParams());
        
        return $this->container->get('templating')->renderResponse('KDBParametersBundle:Default:index.html.twig');
    }
    
    /**
     *
     * Displays parameters creation form
     */
    public function newAction()
    {        
        $form = $this->container->get('kdb_parameters.form');
        $formHandler = $this->container->get('kdb_parameters.form.handler');
        
        $process = $formHandler->process();
        
        if ($process) {
            $this->setFlash('kdb_param_success', 'param.flash.created');
            $url = $this->container->get('router')->generate('kdb_parameters_index');
            
            return new RedirectResponse($url);
        }
        
        
        return $this->container->get('templating')->renderResponse('KDBParametersBundle:Default:new.html.twig',array(
            'form' => $form->createView(),
            'theme' => $this->container->getParameter('kdb_parameters.form.theme'),
        ));
        
    }
    
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->setFlash($action, $value);
    }
}
