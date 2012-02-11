<?php

namespace KDB\ParametersBundle\Twig\Extension;


use KDB\ParametersBundle\Util\ParameterManipulator;


class KDBExtension extends \Twig_Extension
{
    protected $manipulator;

    protected $ressources = array();

    protected $mediaManager;

    public function __construct(ParameterManipulator $manipulator)
    {
        $this->manipulator = $manipulator;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'kdb_parameters';
    }

    public function getFunctions()
    {
        return array(
            'kparam' => new \Twig_Function_Method($this, 'kparam')
        );
    }

    /**
     * @param string $param
     * @param string $default
     * @return string
     */
    public function kparam($param, $default = null)
    {
        $parameters = $this->getManipulator();
        return $parameters->getParam($param, $default);
    }

    /**
     * @return \KDB\ParametersBundle\Util\ParameterManipulator
     */
    public function getManipulator()
    {
        return $this->manipulator;
    }
}