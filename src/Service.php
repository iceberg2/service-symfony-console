<?php

namespace Articstudio\IcebergApp\Service\SymfonyConsole;

use Articstudio\IcebergApp\Service\AbstractService;
use Symfony\Component\Console\Application as SymfonyConsoleApp;
use Illuminate\Support\Collection;
use Articstudio\IcebergApp\Service\SymfonyConsole\Command\Manager as CommandsManager;

class Service extends AbstractService {

    private $commands;

    public function load(Array $commands = []) {
        $service_app = new SymfonyConsoleApp();
        $this->setServiceApp($service_app);
        $this->commands = new Collection($commands);
    }

    public function config() {
        $this->registerCommands();
    }

    public function run() {
        $this->getServiceApp()->run();
    }

    public function getServiceContainer() {
        return null;
    }

    private function registerCommands() {
        $service_app = $this->getServiceApp();
        if (!$this->commands->isEmpty()) {
            $manager = new CommandsManager($this->commands);
            $manager->add($service_app);
        }
    }

}
