<?php

namespace KDB\ParametersBundle\Util;

use KDB\ParametersBundle\Model\ParameterManager as ParameterManagerInterface;
use KDB\ParametersBundle\Util\SessionManipulator;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ParameterManipulator
{
    private $parameterManager;
    
    private $sessionManipulator;
    
    private $container;
    
    public function __construct(ParameterManagerInterface $parameterManager, ContainerInterface $container)
    {
        $this->parameterManager = $parameterManager;
        $this->container = $container;
        $this->sessionManipulator = $this->container->get('kdb_session');
    }
    
    public function create($name, $value)
    {
        $parameter = $this->parameterManager->createParameter();
        $parameter->setName($name);
        $parameter->setValue($value);
        $this->parameterManager->updateParameter($parameter);
        
        //$this->sessionManipulator->set($name, $value);
        //$this->sessionManipulator->save();
        //print_r($this->sessionManipulator->all());
        
        return $parameter;
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
