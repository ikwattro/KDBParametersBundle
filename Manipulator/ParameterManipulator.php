<?php

namespace KDB\ParametersBundle\Manipulator;

use KDB\ParametersBundle\Model\ParameterManager as ParameterManagerInterface;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\DependencyInjection\ContainerInterface;
use KDB\ParametersBundle\Model\ParameterInterface;

class ParameterManipulator
{
    private $parameterManager;
    
    private $sessionManipulator;
    
    private $container;
    
    private $use_session;
    
    public function __construct(ParameterManagerInterface $parameterManager, ContainerInterface $container)
    {
        $this->parameterManager = $parameterManager;
        $this->container = $container;
        $this->sessionManipulator = $this->container->get('kdb_session');
        $this->use_session = $this->container->getParameter('kdb_parameters.use_session');
    }
    
    public function create($name, $value)
    {
        $parameter = $this->parameterManager->createParameter();
        $parameter->setName($name);
        $parameter->setValue($value);
        $this->parameterManager->updateParameter($parameter);
        
        $this->addToSession($parameter);
        
        return $parameter;
    }
    
    public function addToSession(ParameterInterface $parameter)
    {
        if($this->use_session)
        {
            $this->sessionManipulator->create($parameter);
        }
    }
    
    public function getParameter($name)
    {
        return $this->parameterManager->findParamByName($name);
    }
    
    public function getParam($name, $default)
    {
        $param = $this->getParameter($name);
        if($param)
        {
            return $param->getValue();
        }
        
        return $default;
        
    }
    
    
    public function getServiceName()
    {
        return 'KDBParametersBundle';
    }
}
?>
