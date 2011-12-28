<?php

namespace KDB\ParametersBundle\Util;

class ParametersManipulator
{
    protected $class;
    
    
    public function __construct($class)
    {
        $this->class = $class;
    }
    
    public function toUpper($var)
    {
        return strtoupper($var);
    }
    
    
    public function getServiceName()
    {
        return 'KDBParametersBundle provided to you by Kwattro';
    }
}
?>
