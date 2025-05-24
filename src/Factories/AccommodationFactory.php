<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\Accommodation;
use Illuminate\Support\Arr;

class AccommodationFactory
{
    public static function fromArray(array $data): Accommodation
    {
        return new Accommodation(
            name: Arr::get($data, 'name'),
            route: Arr::get($data, 'route'),
        );
    }
}
