<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Model;

/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

abstract class Parameter implements ParameterInterface
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
