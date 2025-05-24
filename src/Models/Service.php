<?php

namespace Vdhicts\SVM\Models;

use Carbon\CarbonInterface;

class Service
{
    public function __construct(
        public string $id,
        public string $tenantId,
        public ?string $description,
        public string $type,
        public string $name,
        public string $subtitle,
        public bool $enabled,
        public CarbonInterface $createdAt,
        public CarbonInterface $updatedAt,
    ) {
    }
}
