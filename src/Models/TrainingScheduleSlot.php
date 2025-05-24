<?php

namespace Vdhicts\SVM\Models;

use Illuminate\Support\Collection;

class TrainingScheduleSlot
{
    /**
     * @param Collection<TrainingScheduleTeamsOnLocations> $locations
     */
    public function __construct(
        public string $startTime,
        public string $endTime,
        public string $id,
        public Collection $locations,
    ) {
    }
}
