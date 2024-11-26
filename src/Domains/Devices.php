<?php

namespace AdminSdk\Domains;

use AdminSdk\Entities\Device;
use AdminSdk\HttpApiClient;

class Devices
{
    public function __construct(
        private HttpApiClient $httpApiClient
    ) {}

    public function publish(string $serial): bool
    {
        $response = $this->httpApiClient->post('cronofy/devices', [
            'serial' => $serial,
        ]);

        $responseMessage = $response['message'] ?? '';

        return $responseMessage === 'Device created';
    }

    public function update(
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

        $response = $this->httpApiClient->patch("cronofy/devices/$serial", $data);

        $responseMessage = $response['message'] ?? '';

        return $responseMessage === 'Device updated';
    }

    public function get(string $serial): Device
    {
        $response = $this->httpApiClient->get("cronofy/devices/$serial");

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
