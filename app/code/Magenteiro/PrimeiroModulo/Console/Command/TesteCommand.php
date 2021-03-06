<?php

namespace Magenteiro\PrimeiroModulo\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TesteCommand extends Command
{
    protected function configure()
    {
        $this->setName('magenteiro:teste');
        $this->setDescription('Nosso primeiro comando.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Teste Primeiro modulo console");
        $output->writeln($this->formatText('>','<'));

    }

    public function formatText($prefix, $sufix){

        return $prefix . "algum texto" . $sufix;
    }
}
