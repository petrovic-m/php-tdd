<?php

declare(strict_types = 1);

require_once __DIR__.'/vendor/autoload.php';

// $config = \App\Helpers\Config::get('app');
$application = new \App\Helpers\App();
echo $application->isDebugMode().PHP_EOL;
echo $application->getEnvironment().PHP_EOL;
echo $application->getLogPath().PHP_EOL;
echo $application->isRunningFromConsole().PHP_EOL;
echo $application->getServerTime()->format('Y-m-d H:i:s').PHP_EOL;

if($application->isRunningFromConsole()){
    echo 'This is from console';
} else {
    echo 'This is from browser';
}