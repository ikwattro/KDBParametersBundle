<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Manipulator;

use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\DependencyInjection\ContainerInterface;
use KDB\ParametersBundle\Model\ParameterInterface;
use KDB\ParametersBundle\Model\ParameterManagerInterface;

/**
 * Parameter manipulator
 *
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 * @author Sergey Gerdel <skif16@ukr.net/>
 */

class ParameterManipulator
{
    /**
     * Parameter manager.
     *
     * @var ParameterManagerInterface
     */
    private $parameterManager;

    /**
     * Parameter manager.
     *
     * @var ParameterManagerInterface
     */
    private $sessionManipulator;

    /**
     * Container interface
     *
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var boolean
     */
    private $use_session;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->parameterManager = $this->container->get('kdb_parameters.manager');
        $this->sessionManipulator = $this->container->get('kdb_session');
        $this->use_session = $this->container->getParameter('kdb_parameters.use_session');
    }

    /**
     * {@inheritdoc}
     */
    public function create($name, $value)
    {
        $parameter = $this->parameterManager->createParameter();
        $parameter->setName($name);
        $parameter->setValue($value);
        $this->parameterManager->persistParameter($parameter);
        
        $this->addToSession($parameter);
        
        return $parameter;
    }

    /**
     * {@inheritdoc}
     */
    public function update(ParameterInterface $parameter)
    {
        $this->parameterManager->persistParameter($parameter);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(ParameterInterface $parameter)
    {
        $this->parameterManager->removeParameter($parameter);
    }

    public function addToSession(ParameterInterface $parameter)
    {
        if($this->use_session)
        {
            $this->sessionManipulator->create($parameter);
        }
    }
}
?>
