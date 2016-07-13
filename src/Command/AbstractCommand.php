<?php

namespace IcebergServiceSymfonyConsole\Command;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use IcebergServiceSymfonyConsole\Contracts\Command\Command as CommandContract;

abstract class AbstractCommand extends SymfonyCommand implements CommandContract
{
  
}