<?php

namespace App\DTOs;

/**
 * Data Transfer Object untuk pembuatan Lead Marketing.
 */
readonly class MarketingLeadDTO
{
    public function __construct(
        public string $name,
        public ?string $email,
        public ?string $phone,
        public string $source,
        public int $marketer_id,
        public ?string $notes = null
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            source: $data['source'],
            marketer_id: $data['marketer_id'],
            notes: $data['notes'] ?? null
        );
    }
}
