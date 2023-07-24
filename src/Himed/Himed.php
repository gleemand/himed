<?php

namespace App\Himed;

use App\Himed\Patient\Patient;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Himed
{
    private HttpClientInterface $httpClient;
    private ObjectNormalizer $normalizer;
    private LoggerInterface $logger;
    private string $apiKey;

    public function __construct(
        HttpClientInterface $httpClient,
        ObjectNormalizer $normalizer,
        ContainerInterface $container,
        LoggerInterface $logger
    ) {
        $this->httpClient = $httpClient;
        $this->normalizer = $normalizer;
        $this->apiUrl = $container->getParameter('himed_api_url');
        $this->apiKey = $container->getParameter('himed_api_key');
        $this->logger = $logger;
    }

    public function createPatient(Patient $patient): JsonResponse
    {
        $this->logger->info(sprintf('Trying to create patient: %s', json_encode($patient)));

        return $this->sendPostRequest('crearPaciente.php', $this->normalizer->normalize($patient));
    }

    private function sendPostRequest(string $path, array $request = [])
    {
        try {
            $response = $this->httpClient->request('POST', $this->apiUrl . $path, [
                'body' => json_encode(array_merge($request, ['api_key' => $this->apiKey])),
            ]);
            $statusCode = $response->getStatusCode();
            $content = $response->getContent();
        } catch (HttpExceptionInterface $e) {
            return new JsonResponse($e->getResponse()->getContent(false), $e->getResponse()->getStatusCode());
        } catch (TransportExceptionInterface $e) {
            return new JsonResponse($e->getMessage(), 500);
        }

        return new JsonResponse($content, $statusCode);
    }
}