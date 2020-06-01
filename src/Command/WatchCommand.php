<?php
/**
 */

namespace Thoth\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class WatchCommand extends Command
{
    protected static $defaultName = 'watch';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Watch for changes, rebuilds if anything is modified')
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
