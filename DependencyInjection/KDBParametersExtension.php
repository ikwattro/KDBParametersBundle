<?php

/*
 * This file is part of the KDBParametersBundle package.
 *
 * (c) kwattro <https://github.com/kwattro/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KDB\ParametersBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

class KDBParametersExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        
        $config = array();
    foreach ($configs as $subConfig) {
        $config = array_merge($config, $subConfig);
    }
        
        #$configuration = new Configuration();
        #$config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        if(isset($config['activate']))
        {
        $container->setParameter('kdb_parameters.activate', $config['activate']);
        }
        
        if(!isset($config['class']))
        {
            throw new \InvalidArgumentException('The "class" parameter in the "kdb_parameters" config must be configured');
        }
        $container->setParameter('kdb_parameters.class', $config['class']);
    }
    
    public function getAlias()
    {
        return 'kdb_parameters';
    }
}
