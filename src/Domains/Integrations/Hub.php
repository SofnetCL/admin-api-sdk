<?php

namespace AdminSdk\Domains\Integrations;

use AdminSdk\Domains\Integrations\Hub\Device;
use AdminSdk\HttpApiClient;

class Hub
{
    public function __construct(
        private HttpApiClient $httpApiClient
    ) {}

    public function publishDevice(string $serial): bool
    {
        $response = $this->httpApiClient->post('integrations/hub/devices', [
            'serial' => $serial,
        ]);

        $responseMessage = $response['message'] ?? '';

        return $responseMessage === 'Device created';
    }

    public function updateDevice(
        string $serial,
        ?string $alias = null,
        ?string $model = null,
        ?string $firmware_version = null,
        ?string $push_version = null,
        ?string $timezone = null
    ): bool {
        $data = [
            'alias' => $alias,
            'model' => $model,
            'firmware_version' => $firmware_version,
            'push_version' => $push_version,
            'timezone' => $timezone,
        ];

        $data = array_filter($data, fn($value) => $value !== null);

        $response = $this->httpApiClient->patch("integrations/hub/devices/$serial", $data);

        $responseMessage = $response['message'] ?? '';

        return $responseMessage === 'Device updated';
    }

    public function getDevice(string $serial): Device
    {
        $response = $this->httpApiClient->get("integrations/hub/devices/$serial");

        return new Device(
            id: $response['id'],
            serial: $response['serial'],
            alias: $response['alias'],
            model: $response['model'],
            firmware_version: $response['firmware_version'],
            push_version: $response['push_version'],
            timezone: $response['timezone'],
            status: $response['status'],
            tenant: $response['tenant'],
            created_at: $response['created_at'],
            updated_at: $response['updated_at'],
            deleted_at: $response['deleted_at'],
        );
    }
}
