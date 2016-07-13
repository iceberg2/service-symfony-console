<?php

namespace IcebergServiceSymfonyConsole\Service;

use IcebergApp\Service\AbstractManager as AbstractServiceManager;
use Symfony\Component\Console\Application as SymfonyConsoleApp;

class Manager extends AbstractServiceManager
{

  public function load(Array $settings = [])
  {
    $service = new SymfonyConsoleApp();
    $this->setService($service);
  }

  public function middleware(Array $middlewares = [])
  {
    //
  }

  public function config(Array $commands = [])
  {
    foreach ($commands as $command)
    {
      $this->getService()->add(new $command());
    }
  }

  public function run(Array $settings = [])
  {
    $this->getService()->run();
  }

  public function getServiceContainer()
  {
    return AppContainer::getInstance();
  }

}
