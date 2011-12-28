<?php

namespace KDB\ParametersBundle\Util;

class ParametersManipulator
{
    protected $_activate;
    
    public function __construct($activate = 'default')
    {
        $this->activate = $activate;
    }
    
    public function getToUpper($var)
    {
        return strtoupper($var);
    }
}
?>
