<?php

namespace App\Sync;

use App\Crm\Crm;
use App\Himed\Himed;
use App\Transformer\Transformer;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class Sync
{
    private Crm $crm;
    private Himed $himed;
    private Transformer $transformer;
    private LoggerInterface $logger;

    public function __construct(Crm $crm, Himed $himed, Transformer $transformer, LoggerInterface $logger)
    {
        $this->crm = $crm;
        $this->himed = $himed;
        $this->transformer = $transformer;
        $this->logger = $logger;
    }

    public function toHimed(string $id, string $site): ?JsonResponse
    {
        $customer = $this->crm->getCustomer($id, $site);
        if (!$customer) {
            $this->logger->error('Customer not found...');

            return new JsonResponse('not found', 404);
        }

        $patient = $this->transformer->toHimed($customer);

        return $this->himed->createPatient($patient);
    }
}