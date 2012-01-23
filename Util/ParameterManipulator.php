<?php

namespace KDB\ParametersBundle\Util;

use KDB\ParametersBundle\Model\ParameterManager as ParameterManagerInterface;

class ParameterManipulator
{
    private $parameterManager;
    
    
    public function __construct(ParameterManagerInterface $parameterManager)
    {
        $this->parameterManager = $parameterManager;
    }
    
    public function create($name, $value)
    {
        $parameter = $this->parameterManager->createParameter();
        $parameter->setName($name);
        $parameter->setValue($value);
        $this->parameterManager->updateParameter($parameter);
        
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
        return 'KDBParametersBundle provided to you by Kwattro';
    }
}
?>
