<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Models\TrainingScheduleLocation;
use Illuminate\Support\Arr;

class TrainingScheduleLocationFactory
{
    public static function fromArray(array $data): TrainingScheduleLocation
    {
        return new TrainingScheduleLocation(
            fieldType: FieldTypeEnum::from(Arr::get($data, 'fieldType')),
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            order: Arr::get($data, 'order'),
        );
    }
}
