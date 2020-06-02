<?php
/**
 */

namespace Thoth;

use Symfony\Component\Console\Application as BaseApplication;

/**
 */
class Application extends BaseApplication
{
    /**
     */
    public function __construct()
    {
        parent::__construct('Thoth');

        $this->addCommands([
            new Command\GenerateCommand(),
            new Command\NewCommand(),
            new Command\SelfUpdateCommand(),
            new Command\ServeCommand(),
            new Command\WatchCommand(),
        ]);
    }
}
