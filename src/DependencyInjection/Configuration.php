<?php

namespace Mlo\ConsoleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $root = $builder->root('mlo_console');

        $root
            ->children()
                ->arrayNode('variables')
                    ->info('Define additional variables to expose')
                    ->useAttributeAsKey('variable_name')
                    ->example([
                        'debug' => '%kernel.debug%',
                        'em' => '@doctrine.orm.entity_manager',
                        'test' => 'foobar',
                    ])
                    ->prototype('variable')->end()
                ->end()
            ->end();

        return $builder;
    }
}
