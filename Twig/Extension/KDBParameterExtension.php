<?php

namespace KDB\ParametersBundle\Twig\Extension;


use KDB\ParametersBundle\Storage\ParametersStorageInterface;


class KDBParameterExtension extends \Twig_Extension
{
    /**
     * @var ParametersStorageInterface
     */
    protected $storage;

    public function __construct(ParametersStorageInterface $storage)
    {
        $this->storage = $storage;
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
        return $this->storage->get($param, $default);
    }
}