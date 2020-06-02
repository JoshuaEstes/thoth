<?php
/**
 */

namespace Thoth\Command;

use Mni\FrontYAML\Parser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
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
                new InputOption('source', 'src', InputOption::VALUE_REQUIRED, 'Where is the directory where you keep all your files?', getcwd().'/example'),
                new InputOption('destination', 'dest', InputOption::VALUE_REQUIRED, 'What directory to you want your site output to?', getcwd().'/public'),
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
        $loader = new FilesystemLoader();
        $loader->addPath('themes/default', 'default');
        $twig = new Environment($loader, [
            'autoescape' => false,
            'debug'      => true,
        ]);

        // init markdown parser
        $parser = new Parser();

        // init filesystem
        $filesystem = new Filesystem();

        // Find Files
        $finder = new Finder();
        $finder
            ->ignoreVCS(true)
            ->sortByName()
            ->files()
            ->name('*.md')
            ->in($input->getOption('source'));

        if (!$finder->hasResults()) {
            $output->writeln('No files found');

            return 1;
        }

        /**
         * Parse and render each file that was found
         */
        foreach ($finder as $file) {
            $output->writeln(sprintf('Parsing "<info>%s</info>"...', $file->getRelativePathname()));
            $document = $parser->parse($file->getContents());
            $context  = [
                'site' => [], // @todo
                'page' => $document->getYAML(),
            ];
            $context['content'] = $twig->createTemplate($document->getContent())->render($context);
            $rendered = $twig
                ->load('@'.$input->getOption('theme').'/base.html.twig')
                ->render($context);
            $filename = preg_replace('/\.md/', '.html', $file->getRelativePathname());
            $filesystem->dumpFile($input->getOption('destination').'/'.$filename, $rendered);
            $output->writeln([
                sprintf('"<info>%s</info>" => "<comment>%s</comment>"', $file->getRelativePathname(), $filename),
                '',
            ]);
        }

        $output->writeln('Complete');

        return 0;
    }
}
