<?php

namespace KDB\ParametersBundle\Tests\Twig\Extension;

use KDB\ParametersBundle\Tests\Twig\Extension\KDBParameterExtension;

class ParameterExtension extends \PHPUnit_Framework_TestCase
{
	
	/**
	 * Tests the return of the default value
	 */
	public function testGet()
	{
		$getter = new ParameterExtension();
		
		$default = 'My site';
		$find_param = $getter->kparam('my_site', $default);
		$this->assertEquals('My site', $find_param);
	}
}
