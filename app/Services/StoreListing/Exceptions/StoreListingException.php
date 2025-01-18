<?php

namespace App\Services\StoreListing\Exceptions;

use Exception;

class StoreListingException extends Exception
{
    public static function invalidScreenshots(): self
    {
        return new self('Invalid screenshots provided. All screenshots must be valid URLs.');
    }

    public static function missingRequiredFields(array $missingFields): self
    {
        return new self(sprintf(
            'Missing required fields: %s',
            implode(', ', $missingFields)
        ));
    }

    public static function storeListingNotFound(int $id): self
    {
        return new self(sprintf('Store listing with ID %d not found', $id));
    }

    public static function invalidSystemRequirements(): self
    {
        return new self('Invalid system requirements format');
    }
}
