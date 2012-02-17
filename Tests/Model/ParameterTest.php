<?php

namespace KDB\ParametersBundle\Tests;

use KDB\ParametersBundle\Model\Parameter;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUsername()
    {
        $parameter = new Parameter();
        $parameter->setName('myvar');
        $parameter->setValue('myvalue');
        $this->assertEquals('myvalue', $parameter->getName());
    }
}