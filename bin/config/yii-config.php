<?php

declare(strict_types=1);

use DI\ContainerBuilder;

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../../");
$dotenv->load();

$containerBuilder = new ContainerBuilder();

if (false) { // Should be set to true in production
	$containerBuilder->enableCompilation(__DIR__ . '/../../var/cache');
}
// Set up settings
$settings = require __DIR__ . '/../../app/settings.php';
$settings($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

return $container->get("settings")["yii"];