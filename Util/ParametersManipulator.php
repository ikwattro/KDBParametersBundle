<?php

namespace KDB\ParametersBundle\Util;

class ParametersManipulator
{
    protected $_activate;
    
    public $bag = array();
    
    public function __construct($activate = 'default')
    {
        $this->activate = $activate;
    }
    
    public function toUpper($var)
    {
        return strtoupper($var);
    }
    
    public function addParam($param, $value)
    {
        $this->bag[$param] = $value;
                
        return;
    }
    
    public function getServiceName()
    {
        return 'KDBParametersBundle provided to you by Kwattro';
    }
}
?>
