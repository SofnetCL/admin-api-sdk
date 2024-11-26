<?php

namespace AdminSdk;

use AdminSdk\Domains\Devices;

class AdminClient
{
    private HttpApiClient $httpApiClient;

    public function __construct(string $apiKey, string $apiUrl)
    {
        $this->httpApiClient = new HttpApiClient();
        $this->httpApiClient->setHeaders([
            'Authorization' => "ApiKey $apiKey",
        ]);
        $this->httpApiClient->setBaseUrl($apiUrl);
    }

    public function devices(): Devices
    {
        return new Devices($this->httpApiClient);
    }
}
