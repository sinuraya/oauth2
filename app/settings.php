<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'doctrine' => [
                'dev_mode' => true,
                'cache_dir' => __DIR__.'/../var/cache/doctrine',
                'metadata_dirs' => [__DIR__.'/../src/Domain/'],
                'metadata_xmldirs' => [__DIR__.'/../src/Domain/mappings'],
                'connection' => [
                    'driver' => 'pdo_'.$_ENV["DB_DRIVER"],
                    'host' => $_ENV["DB_HOST"],
                    // 'port' => 3306,
                    'dbname' => $_ENV["DB_NAME"],
                    'user' => $_ENV["DB_USER"],
                    'password' => $_ENV["DB_PASSWORD"],
                ]
            ],            
            'yii' => [
                'id' => 'oauth',
                'basePath' => dirname(__DIR__),
                'components' => [
                    'db' => [
                        'class' => 'yii\db\Connection',
                        'dsn' => $_ENV["DB_DRIVER"].':host='.$_ENV["DB_HOST"].';dbname='.$_ENV["DB_NAME"],
                        'username' => $_ENV["DB_USER"],
                        'password' => $_ENV["DB_PASSWORD"],
                        'charset' => 'utf8',
                    ],
            
                    'authManager' => [
                        'class' => 'yii\rbac\DbManager',
                    ],
                ],            
            ]
        ],
    ]);
};
