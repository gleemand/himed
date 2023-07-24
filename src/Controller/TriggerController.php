<?php

namespace App\Controller;

use App\Sync\Sync;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TriggerController extends AbstractController
{
    private Sync $sync;
    private LoggerInterface $logger;

    public function __construct(Sync $sync, LoggerInterface $logger)
    {
        $this->sync = $sync;
        $this->logger = $logger;
    }

    /**
     * @Route("/", name="app_trigger")
     */
    public function index(Request $request): JsonResponse
    {
        $id = $request->get('id');
        $site = $request->get('site');
        $this->logger->info('-------------------------------------------------');
        $this->logger->info(sprintf('New request {id: %d, site: %s}', $id, $site));

        if ($id && $site) {
            $result = $this->sync->toHimed($id, $site);
            $this->logger->info(sprintf('Result: %s', json_encode($result)));

            return $result;
        }

        return new JsonResponse('id, site', 400);
    }
}
