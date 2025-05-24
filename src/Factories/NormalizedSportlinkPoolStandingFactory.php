<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\NormalizedSportlinkPoolStanding;
use Illuminate\Support\Arr;

class NormalizedSportlinkPoolStandingFactory
{
    public static function fromArray(array $data): NormalizedSportlinkPoolStanding
    {
        return new NormalizedSportlinkPoolStanding(
            position: Arr::get($data, 'position'),
            played: Arr::get($data, 'played'),
            won: Arr::get($data, 'won'),
            draw: Arr::get($data, 'draw'),
            lost: Arr::get($data, 'lost'),
            goalsFor: Arr::get($data, 'goalsFor'),
            goalsAgainst: Arr::get($data, 'goalsAgainst'),
            goalDifference: Arr::get($data, 'goalDifference'),
            points: Arr::get($data, 'points'),
            lossPoints: Arr::get($data, 'lossPoints'),
            isHomeTeam: Arr::get($data, 'isHomeTeam'),
            teamName: Arr::get($data, 'teamName'),
            providerId: Arr::get($data, 'providerId'),
        );
    }
}
