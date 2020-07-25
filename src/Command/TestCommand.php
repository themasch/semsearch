<?php

declare(strict_types=1);

namespace masch\SemSearch\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    public static $defaultName = 'search:test';

    public function run(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('it works');
        return 0;
    }
}
