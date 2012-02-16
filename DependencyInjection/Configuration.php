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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @package KDBParametersBundle
 * @author Christophe Willemsen <willemsen.christophe@gmail.com/>
 */

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('kdb_parameters');
        
        /*
         * At this time only ORM driver is supported, all contributions for
         * other drivers support are welcome
         */
        $supportedDrivers = array('orm');

        $rootNode
        ->children()
                ->scalarNode('db_driver')
                    ->validate()
                        ->ifNotInArray($supportedDrivers)
                            ->thenInvalid('The %s driver is not supported')
                    ->end()
                    ->cannotBeOverwritten()
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('class')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('form_type')->defaultValue('KDB\ParametersBundle\Form\ParameterFormType')->end()
                ->scalarNode('form_name')->defaultValue('kdb_parameters_param')->end()
                ->scalarNode('manipulator_class')->defaultValue('KDB\ParametersBundle\Util\ParameterManipulator')->end()
                ->scalarNode('use_session')->defaultValue(true)->end()
                ->scalarNode('session_manipulator')->defaultValue('KDB\ParametersBundle\Util\SessionManipulator')->end()
                ->end();
                
                

        return $treeBuilder;
    }
}
