<?php
/*
 * Copyright (c) 2015 Matthew Loberg
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Mlo\ConsoleBundle\Command;

use Psy\Shell;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * ConsoleCommand
 *
 * @author Matthew Loberg <loberg.matt@gmail.com>
 */
class ConsoleCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('console')
            ->setDescription('Interact with the Symfony container from the command line');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $application = $this->getApplication();
        $application->setCatchExceptions(false);
        $application->setAutoExit(false);

        $container = $this->getContainer();

        extract(Shell::debug(array(
            'container' => $container,
            'kernel'    => $container->get('kernel'),
        )));
    }
}
