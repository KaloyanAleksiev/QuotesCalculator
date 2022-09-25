<?php


namespace App\Services;


use GuzzleHttp\Client;

class ZipCodeService
{
    private string $domain;
    private string $secret;
    private Client $client;

    public function __construct(Client $client)
    {
        $this->domain = config('services.zip_code.domain');
        $this->secret = config('services.zip_code.secret');
        $this->client = $client;
    }

    public function getDistance(string $shipFrom, string $deliverTo)
    {
        $response = $this->client->get($this->domain . $this->secret . '/distance.json/' . $shipFrom .'/' . $deliverTo . '/mile');

        return json_decode($response->getBody()->getContents())->distance;
    }
}
