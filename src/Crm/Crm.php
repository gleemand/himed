<?php

namespace App\Crm;

use Psr\Log\LoggerInterface;
use RetailCrm\Api\Client;
use RetailCrm\Api\Enum\ByIdentifier;
use RetailCrm\Api\Factory\SimpleClientFactory;
use RetailCrm\Api\Interfaces\ApiExceptionInterface;
use RetailCrm\Api\Model\Entity\Customers\Customer;
use RetailCrm\Api\Model\Request\BySiteRequest;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Crm
{
    private Client $client;
    private LoggerInterface $logger;

    public function __construct(ContainerInterface $container, LoggerInterface $logger)
    {
        $this->client = SimpleClientFactory::createClient(
            $container->getParameter('crm_api_url'),
            $container->getParameter('crm_api_key')
        );
        $this->logger = $logger;
    }

    public function getCustomer(string $id, string $site): ?Customer
    {
        $this->logger->info('Trying to get customer...');

        try {
            $response = $this->client->customers->get(
                $id,
                new BySiteRequest(ByIdentifier::ID, $site)
            );
        } catch (ApiExceptionInterface $exception) {
            $this->logger->error(sprintf(
                'Error from RetailCRM API (status code: %d): %s',
                $exception->getStatusCode(),
                $exception->getMessage()
            ));

            if (count($exception->getErrorResponse()->errors) > 0) {
                $this->logger->error('Errors: ' . implode(', ', $exception->getErrorResponse()->errors));
            }

            return null;
        }

        $this->logger->info(sprintf('Found: %s', json_encode($response->customer)));

        return $response->customer;
    }
}