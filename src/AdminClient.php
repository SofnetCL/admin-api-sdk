<?php

namespace AdminSdk;

use AdminSdk\Domains\Integrations;

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

    public function integrations(): Integrations
    {
        return new Integrations($this->httpApiClient);
    }
}
