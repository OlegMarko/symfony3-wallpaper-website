<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AppSetupWallpapersCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:setup-wallpapers')
            ->setDescription('Console command descriptions.');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Command result.');
    }

}
