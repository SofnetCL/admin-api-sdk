<?php

namespace AdminSdk\Entities;

class Tenant
{
    public function __construct(
        private string $id,
        private string $subdomain,
        private bool $active,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getSubdomain(): string
    {
        return $this->subdomain;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'subdomain' => $this->subdomain,
            'active' => $this->active,
        ];
    }
}
