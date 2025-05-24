<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\TrainingScheduleTeamsOnLocations;
use Illuminate\Support\Arr;

class TrainingScheduleTeamsOnLocationsFactory
{
    public static function fromArray(array $data): TrainingScheduleTeamsOnLocations
    {
        return new TrainingScheduleTeamsOnLocations(
            location: TrainingScheduleLocationFactory::fromArray(Arr::get($data, 'location')),
            team: TrainingScheduleTeamFactory::fromArray(Arr::get($data, 'team')),
        );
    }
}
