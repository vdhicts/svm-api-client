<?php

namespace Vdhicts\SVM\Models;

use Illuminate\Support\Collection;

class TrainingSchedule
{
    /**
     * @param Collection<TrainingScheduleDayOfWeek> $indoorSlots
     * @param Collection<TrainingScheduleDayOfWeek> $outdoorSlots
     * @param Collection<TrainingScheduleLocation> $locations
     */
    public function __construct(
        public Collection $indoorSlots,
        public Collection $outdoorSlots,
        public Collection $locations,
    ) {
    }
}
