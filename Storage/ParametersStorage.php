<?php

    /*
     * This file is part of the KDBParametersBundle.
     *
     * (c) Sergey Gerdel
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */
namespace KDB\ParametersBundle\Storage;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ParametersStorage implements ParametersStorageInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    protected $parameters;

    protected $autoLoad;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function get($name, $default = null)
    {
        if (!isset($this->parameters[$name])){

            if ($this->autoLoad != 1){
                $value = $this->getParameterValue($name);
            }
            else{
                $value = '';
            }
            $this->parameters[$name] = $value;
        }
        if (empty($this->parameters[$name])){
            return $default;
        }
        return $this->parameters[$name];
    }

    public function getAll()
    {
        return $this->parameters;
    }

    public function refresh()
    {
        return $this->getParameters();
    }

    public function autoLoad()
    {
        $this->autoLoad = 1;
        $this->getParameters();
    }

    private function getParameters()
    {
        $allParameters = $this->container->get('kdb_parameters.manager')->findActiveParams();
        $parameters = array();
        foreach ($allParameters as $v)
        {
            /** @var $v \KDB\ParametersBundle\Model\Parameter **/
            $parameters[$v->getName()] = $v->getValue();
        }
        $this->parameters = $parameters;
        return $this->parameters;
    }

    private function getParameterValue($name)
    {
        $parameter = $this->container->get('kdb_parameters.manager')->findActiveParameterByName($name);
        if ($parameter){
            return $parameter->getValue();
        }
        return '';
    }
}