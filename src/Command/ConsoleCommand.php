<?php
/*
 * Copyright (c) 2015 Matthew Loberg
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Mlo\ConsoleBundle\Command;

use Psy\Shell;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * ConsoleCommand
 *
 * @author Matthew Loberg <loberg.matt@gmail.com>
 */
class ConsoleCommand extends Command
{
    /**
     * @var Shell
     */
    private $shell;

    /**
     * Constructor
     *
     * @param Shell $shell
     */
    public function __construct(Shell $shell)
    {
        parent::__construct();

        $this->shell = $shell;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('console')
            ->setAliases(['tinker'])
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

        $this->shell->run();
    }
}
