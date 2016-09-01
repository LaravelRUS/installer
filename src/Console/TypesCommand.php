<?php

namespace LaravelRUS\Installer\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TypesCommand extends Command
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
            ->setName('types')
            ->setDescription('An overview of all types of applications.');
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
        $output->writeln(
            "\nTo create an application specific type, enter ".
            "<info>--type</info> option with name of type.\n\n".

            "Example:\n".
            "    <info>laravelrus new MyApp --type clean</info>\n\n".

            "<comment>Available types of applications:</comment>"
        );

        $separator = new TableSeparator();
        $rows = [];

        foreach ($this->projects as $type => $project) {
            $rows ? $rows[] = $separator : null;
            $rows[] = [$type, $project['name'], $project['description']];
        }

        (new Table($output))
            ->setHeaders(['Type', 'Package name', 'Description'])
            ->setRows($rows)
            ->render();
    }
}
