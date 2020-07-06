<?php
declare(strict_types=1);

namespace App\Application\Actions\Client;

use Psr\Log\LoggerInterface;
use App\Application\Actions\Action;
use App\Domain\Repositories\ClientRepository;

abstract class ClientAction extends Action
{
    /**
     * @var ClientRepository
     */
    protected $clientRepository;

    /**
     * @param LoggerInterface $logger
     * @param ClientRepository  $ClientRepository
     */
    public function __construct(LoggerInterface $logger, ClientRepository $clientRepository)
    {
        parent::__construct($logger);
        $this->clientRepository = $clientRepository;
    }
}
