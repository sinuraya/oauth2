<?php
declare(strict_types=1);

namespace App\Application\Actions\Client;

use App\Domain\Entities\ClientEntity;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{

    /**
     * transform
     *
     * @param ClientEntity $clientEntity
     * @return array 
     */
    public function transform(ClientEntity $client)
    {
        return [
            "client_id" => (string) $client->getClientId(),
            "name" => (string) $client->getName(), 
            "username" => (string) $client->getUsername(),
            "email" => (string) $client->getEmail(),
            "site_url" => (string) $client->getSiteUrl(),
            "phone" => (string) $client->getPhone(),
            "pic" => (string) $client->getPic(),
            "secret_key" => (string) $client->getSecretKey(),
            "auth_key" => (string) $client->getAuthKey(),
            "status" => (integer) $client->getStatus(),
            "created_at" => (string) $client->getCreatedAt()->format('Y-m-d h:i:s'),
            "updated_at" => (string) $client->getUpdatedAt()->format('Y-m-d h:i:s'),
        ];
    }        
}