<?php

namespace KDB\ParametersBundle\Util;

use Symfony\Component\HttpFoundation\Session;
//use KDB\ParametersBundle\Util\SessionBag;

class SessionManipulator extends Session
{
    public $session;
    
    public function __construct(Session $session)
    {
        
    }
    
    
}