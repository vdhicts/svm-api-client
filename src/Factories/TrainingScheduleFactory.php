<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Enums\DayOfWeekEnum;
use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Models\TrainingSchedule;
use Vdhicts\SVM\Models\TrainingScheduleDayOfWeek;
use Vdhicts\SVM\Models\TrainingScheduleLocation;
use Vdhicts\SVM\Models\TrainingScheduleSlot;
use Illuminate\Support\Arr;

class TrainingScheduleFactory
{
    public static function fromArray(array $data): TrainingSchedule
    {
        $indoorSlots = collect();
        foreach (Arr::get($data, FieldTypeEnum::Indoor->value, []) as $dayOfWeek => $slots) {
            $indoorSlots->push(new TrainingScheduleDayOfWeek(
                dayOfWeek: DayOfWeekEnum::from($dayOfWeek),
                slots: collect($slots)->map(fn (array $slot): TrainingScheduleSlot => TrainingScheduleSlotFactory::fromArray($slot)),
            ));
        }

        $outdoorSlots = collect();
        foreach (Arr::get($data, FieldTypeEnum::Outdoor->value, []) as $dayOfWeek => $slots) {
            $outdoorSlots->push(new TrainingScheduleDayOfWeek(
                dayOfWeek: DayOfWeekEnum::from($dayOfWeek),
                slots: collect($slots)->map(fn (array $slot): TrainingScheduleSlot => TrainingScheduleSlotFactory::fromArray($slot)),
            ));
        }

        return new TrainingSchedule(
            indoorSlots: $indoorSlots,
            outdoorSlots: $outdoorSlots,
            locations: collect(Arr::get($data, 'locations'))->map(fn (array $location): TrainingScheduleLocation => TrainingScheduleLocationFactory::fromArray($location)),
        );
    }
}
