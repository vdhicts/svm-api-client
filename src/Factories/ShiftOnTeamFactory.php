<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\ShiftOnTeam;
use Illuminate\Support\Arr;

class ShiftOnTeamFactory
{
    public static function fromArray(array $data): ShiftOnTeam
    {
        return new ShiftOnTeam(
            team: TeamIdentifierFactory::fromArray(Arr::get($data, 'team')),
        );
    }
}
