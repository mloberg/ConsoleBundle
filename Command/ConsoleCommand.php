<?php

namespace Mlo\ConsoleBundle\Command;

use Psy\Shell;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ConsoleCommand extends Command
{
    protected static $defaultName = 'tinker';

    private $shell;

    public function __construct(Shell $shell)
    {
        parent::__construct();

        $this->shell = $shell;
    }

    protected function configure()
    {
        $this
            ->setDescription('Interact with the Symfony container from the command line');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $application = $this->getApplication();
        $application->setCatchExceptions(false);
        $application->setAutoExit(false);

        return $this->shell->run();
    }
}
