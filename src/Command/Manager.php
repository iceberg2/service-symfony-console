<?php

namespace Articstudio\IcebergApp\Service\SymfonyConsole\Command;

use Articstudio\IcebergApp\Support\Collection;
use Symfony\Component\Console\Application as SymfonyConsoleApp;
use Articstudio\IcebergApp\Service\SymfonyConsole\Exception\Command\NotFoundException;

class Manager {

    private $commands;

    public function __construct(Collection $commands) {
        $this->commands = $commands;
    }

    public function add(SymfonyConsoleApp $app) {
        foreach ($this->commands as $command) {
            $this->addCommand($app, $command);
        }
    }

    private function addCommand(SymfonyConsoleApp $app, $command_class_name) {
        if (!is_string($command_class_name) || !class_exists($command_class_name)) {
            throw new NotFoundException(sprintf('Symfony console command error while retrieving "%s"', $command_class_name));
        }
        try {
            $command = new $command_class_name;
            $app->add($command);
        } catch (Exception $exception) {
            throw new NotFoundException(sprintf('Symfony console command error while retrieving "%s"', $command_class_name), null, $exception);
        } catch (Throwable $exception) {
            throw new NotFoundException(sprintf('Symfony console command error while retrieving "%s"', $command_class_name), null, $exception);
        }
    }

}
