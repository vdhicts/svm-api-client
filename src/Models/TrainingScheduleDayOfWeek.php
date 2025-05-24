<?php

namespace Vdhicts\SVM\Models;

use Vdhicts\SVM\Enums\DayOfWeekEnum;
use Illuminate\Support\Collection;

class TrainingScheduleDayOfWeek
{
    /**
     * @param Collection<TrainingScheduleSlot> $slots
     */
    public function __construct(
        public DayOfWeekEnum $dayOfWeek,
        public Collection $slots,
    ) {
    }
}
