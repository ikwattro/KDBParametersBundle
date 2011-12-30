<?php

namespace KDB\ParametersBundle\Util;

class ParametersManipulator
{
    private $parameterManager;
    
    
    public function __construct(ParameterManager $parameterManager)
    {
        $this->parameterManager = $parameterManager;
    }
    
    
    public function getServiceName()
    {
        return 'KDBParametersBundle provided to you by Kwattro';
    }
}
?>
