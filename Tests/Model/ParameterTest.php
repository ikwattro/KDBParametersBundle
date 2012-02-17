<?php

namespace KDB\ParametersBundle\Tests\Model;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testParameterName()
    {
        $parameter = $this->getParameter();
        $parameter->setName('myvar');
        $parameter->setValue('myvalue');
        $this->assertEquals('myvalue', $parameter->getValue());
    }
    
    public function testParameterKeyName()
    {
        $parameter = $this->getParameter();
        $parameter->setName('mykey');
        $parameter->setValue('myvalue');
        $this->assertEquals('mykey', $parameter->getName());
    }
    
    public function getParameter()
    {
        return $this->getMockForAbstractClass('KDB\ParametersBundle\Model\Parameter');
    }
}