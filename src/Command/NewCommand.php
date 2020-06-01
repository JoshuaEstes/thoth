<?php
/**
 */

namespace Thoth\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class NewCommand extends Command
{
    protected static $defaultName = 'new';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Create a new Thoth project')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(self::$defaultName);

        return 0;
    }
}
