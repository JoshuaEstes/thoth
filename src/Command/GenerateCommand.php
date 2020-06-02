<?php
/**
 */

namespace Thoth\Command;

use ParsedownExtra;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 */
class GenerateCommand extends Command
{
    protected static $defaultName = 'generate';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Generates website')
            ->setDefinition([
                new InputOption('source', 'src', InputOption::VALUE_REQUIRED, 'Where is the directory where you keep all your files?', 'example'),
                new InputOption('destination', 'dest', InputOption::VALUE_REQUIRED, 'What directory to you want your site output to?', 'public'),
                new InputOption('theme', null, InputOption::VALUE_REQUIRED, '', 'default'),
                //new InputOption('config', null, InputOption::VALUE_REQUIRED, '', '.thoth.yml'),
                //new InputOption('env', null, InputOption::VALUE_REQUIRED, '', 'prod'),
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // init twig
        $loader = new FilesystemLoader(['themes/default']);
        $loader->addPath('themes/default', 'default');
        $twig = new Environment($loader, [
            'autoescape' => false,
            'debug'      => true,
        ]);

        // init markdown parser
        $pExtra = new ParsedownExtra();
        $pExtra->setBreaksEnabled(true);

        // Find Files
        $finder = new Finder();
        $finder->files()->in($input->getOption('source'));

        if (!$finder->hasResults()) {
            $output->writeln('No files found');

            return 1;
        }

        foreach ($finder as $file) {
            $output->writeln(sprintf('Parsing "<info>%s</info>"', $file->getRelativePathname()));
            $content  = $pExtra->text(file_get_contents($file->getRealPath()));
            $rendered = $twig->load('@'.$input->getOption('theme').'/base.html.twig')->render(['content' => $content]);
            $filename = preg_replace('/\.md/', '.html', $file->getRelativePathname());
            file_put_contents($input->getOption('destination').'/'.$filename, $rendered);
        }

        $output->writeln('Complete');

        return 0;
    }
}
