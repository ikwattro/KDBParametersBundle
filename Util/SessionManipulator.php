<?php

namespace KDB\ParametersBundle\Util;

use Symfony\Component\HttpFoundation\Session\Session;
use KDB\ParametersBundle\Model\ParameterInterface;

class SessionManipulator extends Session
{
    public $session;
    
    public function __construct(Session $session)
    {
        $this->session = $session;
    }
    
    public function create(ParameterInterface $parameter)
    {
        $this->session->set($parameter->getName(), $parameter->getValue());
    }
    
    
}