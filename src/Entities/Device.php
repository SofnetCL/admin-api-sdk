<?php

namespace AdminSdk\Entities;

class Device
{
    public function __construct(
        private string $id,
        private string $serial,
        private ?string $alias,
        private ?string $model,
        private ?string $firmware_version,
        private ?string $push_version,
        private string $timezone,
        private string $status,
        private ?array $tenant,
        private string $created_at,
        private string $updated_at,
        private ?string $deleted_at,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getSerial(): string
    {
        return $this->serial;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function getFirmwareVersion(): ?string
    {
        return $this->firmware_version;
    }

    public function getPushVersion(): ?string
    {
        return $this->push_version;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    public function getTenant(): ?Tenant
    {
        if ($this->tenant) {
            return new Tenant(
                id: $this->tenant['id'],
                subdomain: $this->tenant['subdomain'],
                active: $this->tenant['active'],
            );
        }

        return null;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'serial' => $this->serial,
            'alias' => $this->alias,
            'model' => $this->model,
            'firmware_version' => $this->firmware_version,
            'push_version' => $this->push_version,
            'timezone' => $this->timezone,
            'status' => $this->status,
            'tenant' => $this->getTenant()?->toArray(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
