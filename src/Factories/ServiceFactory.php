<?php

namespace Vdhicts\SVM\Factories;

use Carbon\Carbon;
use Vdhicts\SVM\Models\Service;
use Illuminate\Support\Arr;

class ServiceFactory
{
    public static function fromArray(array $data): Service
    {
        return new Service(
            id: Arr::get($data, 'id'),
            tenantId: Arr::get($data, 'tenantId'),
            description: Arr::get($data, 'description'),
            type: Arr::get($data, 'type'),
            name: Arr::get($data, 'name'),
            subtitle: Arr::get($data, 'subtitle'),
            enabled: Arr::get($data, 'enabled'),
            createdAt: Carbon::parse(Arr::get($data, 'createdAt')),
            updatedAt: Carbon::parse(Arr::get($data, 'updatedAt')),
        );
    }
}
