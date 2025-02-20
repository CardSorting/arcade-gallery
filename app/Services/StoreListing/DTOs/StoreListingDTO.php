<?php

namespace App\Services\StoreListing\DTOs;

class StoreListingDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $version,
        public readonly int $size,
        public readonly string $age_rating,
        public readonly array $screenshots,
        public readonly array $systemRequirements,
        public readonly array $developerInfo,
        public readonly array $platforms,
        public readonly string $icon_url,
public readonly int $downloads,
        public readonly array $features = [],
        public readonly ?array $game = null,
        public readonly ?int $id = null,
        public readonly float $average_rating = 0.0,
        public readonly int $reviews_count = 0,
        public readonly ?\Carbon\Carbon $updated_at = null
    ) {}

public function toArray(): array
{
    return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'version' => $this->version,
        'screenshots' => $this->screenshots,
        'system_requirements' => $this->systemRequirements,
        'developer_info' => $this->developerInfo,
        'game' => $this->game,
        'size' => $this->size,
        'age_rating' => $this->age_rating,
        'features' => $this->features,
        'icon_url' => $this->icon_url,
        'average_rating' => $this->average_rating,
        'reviews_count' => $this->reviews_count,
        'downloads' => $this->downloads,
        'updated_at' => $this->updated_at?->toDateTimeString()
    ];
}
}
