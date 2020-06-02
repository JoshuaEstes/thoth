<?php
/**
 */

namespace Thoth\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 */
class SelfUpdateCommand extends Command
{
    protected static $defaultName = 'self-update';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Upgrade Thoth to the latest release')
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
