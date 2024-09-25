<?php

namespace AdminSdk\Domains;

use AdminSdk\Domains\Integrations\Hub;
use AdminSdk\HttpApiClient;

class Integrations
{
    public function __construct(
        private HttpApiClient $httpApiClient
    ) {}

    public function hub(): Hub
    {
        return new Hub($this->httpApiClient);
    }
}
