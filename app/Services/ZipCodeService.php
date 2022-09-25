<?php

namespace App\Services;

use App\Repositories\Interfaces\Logs\LogRepositoryInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class ZipCodeService
{
    private string $domain;
    private string $secret;
    private Client $client;
    private LogRepositoryInterface $logRepository;

    public function __construct(Client $client, LogRepositoryInterface $logRepository)
    {
        $this->domain = config('services.zip_code.domain');
        $this->secret = config('services.zip_code.secret');
        $this->client = $client;
        $this->logRepository = $logRepository;
    }

    public function getDistance(string $shipFrom, string $deliverTo)
    {
        $distance = 0.0;
        try {
            $response = $this->client->get($this->domain . $this->secret . '/distance.json/' . $shipFrom . '/' . $deliverTo . '/mile');
            $contents = $response->getBody()->getContents();

            $this->logRepository->create(['source' => get_class(), 'data' => $contents]);
            $distance = json_decode($contents)->distance ?? 0;
        } catch (ClientException | \Exception $e) {
            $this->logRepository->create(['source' => get_class(), 'data' => $e->getResponse()->getBody()->getContents()]);
        }

        return $distance;
    }

    public function getStateCode(string $zipCode)
    {
        $stateCode = '';
        try {
        $response = $this->client->get($this->domain . $this->secret . '/info.json/' . $zipCode . '/degrees');
            $contents = $response->getBody()->getContents();

            $this->logRepository->create(['source' => get_class(), 'data' => $contents]);
            $stateCode = json_decode($contents)->state ?? '';
        } catch (ClientException | \Exception $e) {
            $this->logRepository->create(['source' => get_class(), 'data' => $e->getResponse()->getBody()->getContents()]);
        }

        return $stateCode;
    }
}
