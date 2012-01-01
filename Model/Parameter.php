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
    protected $active;
    protected $activates_at;
    protected $expires_at;
    
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
    
    public function getActive()
    {
        return $this->active;
    }
    
    public function getActivatesAt()
    {
        return $this->activates_at;
    }
    
    public function getExpiresAt()
    {
        return $this->expires_at;
    }
    
    public function setActive($boolean)
    {
        $this->active = $boolean;
    }
    
    public function setExpiresAt(\DateTime $datetime = null)
    {
        $this->expires_at = $datetime;
    }
    
    public function setActivatesAt(\DateTime $datetime = null)
    {
        $this->activates_at = $datetime;
    }
}
?>
