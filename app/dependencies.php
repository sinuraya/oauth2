<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Log\LoggerInterface;

use Doctrine\DBAL\Logging\MonologSQLLogger;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;


require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        EntityManagerInterface::class => function (ContainerInterface $c): EntityManager {
            $doctrineSettings = $c->get('settings')['doctrine'];
            $config = Setup::createXMLMetadataConfiguration(
                $doctrineSettings['metadata_xmldirs'],
                $doctrineSettings['dev_mode']
            );
        
            $config->setMetadataCacheImpl(
                new FilesystemCache($doctrineSettings['cache_dir'])
            );
            $logger = $c->get(LoggerInterface::class);
            $config->setSQLLogger(new MonologSQLLogger($logger));            
            $em = EntityManager::create($doctrineSettings['connection'], $config);
            return $em;
        },
        "authManager" => function(ContainerInterface $c) {
            $settings = $c->get('settings');
            $yiiConfig = $settings["yii"];
            new yii\web\Application($yiiConfig); // Do NOT call run() here
            return Yii::$app->authManager;
        }
    ]);
};
