<?php
declare(strict_types=1);

use App\Application\Actions\Client\ListClientsAction;
use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Psr\Log\LoggerInterface;


return function (App $app) {
    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        // $logger = $this->get(LoggerInterface::class);
        // $logger->info("Logger sudah berhasil dibuat!");
        // $response->getBody()->write(json_encode($this->get("authManager")));
        return $response;
    });

    $app->get("/clients", ListClientsAction::class);

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
