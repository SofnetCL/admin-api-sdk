<?php

namespace AdminSdk\Tests;

use AdminSdk\AdminClient;
use AdminSdk\HttpApiClient;
use PHPUnit\Framework\TestCase;

class AdminClientTest extends TestCase
{
    private AdminClient $adminClient;
    private $httpApiClientMock;

    protected function setUp(): void
    {
        $this->httpApiClientMock = $this->createMock(HttpApiClient::class);

        $this->adminClient = new AdminClient('fake_api_key', 'https://api.example.com');
        $reflection = new \ReflectionClass($this->adminClient);
        $httpApiClientProperty = $reflection->getProperty('httpApiClient');
        $httpApiClientProperty->setAccessible(true);
        $httpApiClientProperty->setValue($this->adminClient, $this->httpApiClientMock);
    }
}
