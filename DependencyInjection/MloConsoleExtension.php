<?php

namespace Mlo\ConsoleBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class MloConsoleExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new PhpFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.php');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $variables = array_map(function ($value) {
            if (is_string($value) && $value[0] === '@') {
                return new Reference(substr($value, 1));
            }

            return $value;
        }, $config['variables']);

        $containerRef = new Reference('service_container');

        $container
            ->findDefinition('mlo_console.shell')
            ->addMethodCall('setScopeVariables', [array_merge([
                'container' => $containerRef,
                'kernel' => new Reference('kernel'),
            ], $variables)])
            ->addMethodCall('setBoundObject', [ $containerRef ]);
    }
}
