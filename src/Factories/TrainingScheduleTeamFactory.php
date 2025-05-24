<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\TrainingScheduleTeam;
use Illuminate\Support\Arr;

class TrainingScheduleTeamFactory
{
    public static function fromArray(array $data): TrainingScheduleTeam
    {
        return new TrainingScheduleTeam(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
        );
    }
}
