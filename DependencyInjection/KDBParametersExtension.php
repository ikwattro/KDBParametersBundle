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
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $this->bindParameters($container, 'kdb_parameters', $config);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        $loader->load(sprintf('%s.yml',$config['db_driver']));
    }
    
    public function getAlias()
    {
        return 'kdb_parameters';
    }
    
    public function bindParameters(ContainerBuilder $container, $name, $config)
    {
        if(is_array($config))
        {
            foreach($config as $key => $value)
            {
                $this->bindParameters($container, $name.'.'.$key, $value);
            }
        }
        else
        {
            $container->setParameter($name, $config);
        }
    }
}
