<?php

namespace LaravelRUS\Installer\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class NewCommand extends Command
{
    protected $projects;

    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->projects = require(__DIR__.'/../projects.php');
        $this
            ->setName('new')
            ->setDescription('Create a new Laravel application.')
            ->addArgument('name', InputArgument::OPTIONAL)
            ->addOption('type', 't', InputOption::VALUE_REQUIRED)
            ->addOption('no-ansi', null, InputOption::VALUE_NONE);
    }

    /**
     * Execute the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->verifyApplicationDoesntExist(
            $directory = ($input->getArgument('name')) ? getcwd().'/'.$input->getArgument('name') : getcwd()
        );

        $this->verifyTypeExist(
            $type = $input->getOption('type') ?: 'basic'
        );

        $output->writeln('<info>Crafting application...</info>');
        $composer = $this->findComposer();
        $project = $this->projects[$type]['name'];
        $command = sprintf('%s create-project %s %s', $composer, $project, $directory);

        if ($input->getOption('no-ansi')) {
            $command .= ' --no-ansi';
        }

        $process = new Process($command, null, null, null, null);

        if ('\\' !== DIRECTORY_SEPARATOR && file_exists('/dev/tty') && is_readable('/dev/tty')) {
            $process->setTty(true);
        }

        $process->run(function ($type, $line) use ($output) {
            $output->write($line);
        });
        $output->writeln('<comment>Application ready! Build something amazing.</comment>');
    }

    /**
     * Verify that the application does not already exist.
     *
     * @param string $directory
     */
    protected function verifyApplicationDoesntExist($directory)
    {
        if ((is_dir($directory) || is_file($directory)) && $directory != getcwd()) {
            throw new \RuntimeException('Application already exists!');
        }
    }

    /**
     * Verify that the type exist.
     *
     * @param $type
     */
    protected function verifyTypeExist($type)
    {
        if (!array_key_exists($type, $this->projects)) {
            throw new \RuntimeException(sprintf('Application type "%s" does not exists!', $type));
        }
    }

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd().'/composer.phar')) {
            return '"'.PHP_BINARY.'" composer.phar';
        }

        return 'composer';
    }
}
