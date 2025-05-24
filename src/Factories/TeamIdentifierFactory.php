<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\TeamIdentifier;
use Illuminate\Support\Arr;

class TeamIdentifierFactory
{
    public static function fromArray(array $data): TeamIdentifier
    {
        return new TeamIdentifier(
            name: Arr::get($data, 'name'),
        );
    }
}
