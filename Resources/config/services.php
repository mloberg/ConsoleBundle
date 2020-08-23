<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Mlo\ConsoleBundle\Command\ConsoleCommand;
use Psy\Shell;

return static function (ContainerConfigurator $container) {
    $container->services()
        ->set('mlo_console.shell', Shell::class)

        ->set('mlo_console.command', ConsoleCommand::class)
            ->args([
                service('mlo_console.shell'),
            ])
            ->tag('console.command', ['command' => 'tinker'])
    ;
};
