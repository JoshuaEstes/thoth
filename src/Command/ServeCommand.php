<?php
/**
 */

namespace Thoth\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class ServeCommand extends Command
{
    protected static $defaultName = 'serve';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Serve built website')
            // host = 0.0.0.0
            // port = 8080
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
