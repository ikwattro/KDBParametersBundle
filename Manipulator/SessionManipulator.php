<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\Manipulator;

use Symfony\Component\HttpFoundation\Session\Session;
use KDB\ParametersBundle\Model\ParameterInterface;

/**
 * Session manipulator
 *
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 * @author Sergey Gerdel <skif16@ukr.net/>
 */

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