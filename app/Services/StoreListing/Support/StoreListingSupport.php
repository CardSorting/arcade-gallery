<?php

namespace App\Services\StoreListing\Support;

use App\Services\StoreListing\DTOs\StoreListingDTO;

class StoreListingSupport
{
    public static function formatSystemRequirements(array $requirements): array
    {
        return array_map(function($requirement) {
            return [
                'os' => $requirement['os'] ?? 'Unknown',
                'processor' => $requirement['processor'] ?? 'Unknown',
                'memory' => $requirement['memory'] ?? 'Unknown',
                'graphics' => $requirement['graphics'] ?? 'Unknown',
                'storage' => $requirement['storage'] ?? 'Unknown'
            ];
        }, $requirements);
    }

    public static function validateScreenshots(array $screenshots): bool
    {
        return count(array_filter($screenshots, function($screenshot) {
            return filter_var($screenshot, FILTER_VALIDATE_URL);
        })) === count($screenshots);
    }

    public static function prepareDTOData(array $data): array
    {
        return [
            'title' => $data['title'] ?? '',
            'description' => $data['description'] ?? '',
            'version' => $data['version'] ?? '1.0.0',
            'screenshots' => $data['screenshots'] ?? [],
            'systemRequirements' => self::formatSystemRequirements($data['system_requirements'] ?? []),
            'developerInfo' => $data['developer_info'] ?? [],
            'game' => $data['game'] ?? null,
            'size' => $data['size'] ?? 0,
            'age_rating' => $data['age_rating'] ?? 'N/A',
            'features' => $data['features'] ?? [],
            'icon_url' => $data['icon_url'] ?? ''
        ];
    }
}
