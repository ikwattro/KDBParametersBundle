<?php

namespace KDB\ParametersBundle\Model;

abstract class Parameter
{
    protected $name;
    protected $value;
    
    public function __construct()
    {
        
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function setName($aString)
    {
        $this->name = $aString;
    }
    
    public function setValue($aString)
    {
        $this->value = $aString;
    }
}
?>
