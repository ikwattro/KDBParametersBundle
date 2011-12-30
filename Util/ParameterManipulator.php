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
    
    
    public function getServiceName()
    {
        return 'KDBParametersBundle provided to you by Kwattro';
    }
}
?>
