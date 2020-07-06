<?php
declare(strict_types=1);

namespace App\Application\Actions\Client;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
// use League\Fractal\Resource\Item;
use Psr\Http\Message\ResponseInterface as Response;

class ListClientsAction extends ClientAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $clients = $this->clientRepository->getAllClient();

        /* Serialize the response data. */
        $fractal = new Manager();
        $clientTransformer = new ClientTransformer();
        $resource = new Collection($clients, $clientTransformer);
        $data = $fractal->createData($resource)->toArray()["data"];
        $this->logger->info("Clients list was viewed. count: ". \count($clients) );

        return $this->respondWithData($data);
    }
}
