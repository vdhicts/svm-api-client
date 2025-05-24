<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\TrainingScheduleSlot;
use Vdhicts\SVM\Models\TrainingScheduleTeamsOnLocations;
use Illuminate\Support\Arr;

class TrainingScheduleSlotFactory
{
    public static function fromArray(array $data): TrainingScheduleSlot
    {
        return new TrainingScheduleSlot(
            startTime: Arr::get($data, 'startTime'),
            endTime: Arr::get($data, 'endTime'),
            id: Arr::get($data, 'id'),
            locations: collect(Arr::get($data, 'locations'))->map(fn (array $location): TrainingScheduleTeamsOnLocations => TrainingScheduleTeamsOnLocationsFactory::fromArray($location)),
        );
    }
}
