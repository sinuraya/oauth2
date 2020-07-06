<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Domain\Repositories;

use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use App\Domain\Entities\ClientEntity;
use Doctrine\ORM\EntityManagerInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;    
    }
    /**
     * {@inheritdoc}
     */
    public function getClientEntity($clientIdentifier)
    {

        if (false ===  $client = $this->entityManager->find(ClientEntity::class, $clientIdentifier)) {
            return false;
        }
        return $client;
    }

    

    /**
     * {@inheritdoc}
     */
    public function validateClient($clientIdentifier, $clientSecret, $grantType)
    {

        // // Check if client is registered
        // if (\array_key_exists($clientIdentifier, $clients) === false) {
        //     return false;
        // }

        // if (
        //     $clients[$clientIdentifier]['is_confidential'] === true
        //     && \password_verify($clientSecret, $clients[$clientIdentifier]['secret']) === false
        // ) {
        //     return false;
        // }

        return true;
    }

    public function getAllClient() {
        $dql = "select c from ".ClientEntity::class." c"; 
        $clients = $this->entityManager->createQuery($dql)->getResult();
        return $clients;
    }
}
