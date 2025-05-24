<?php

namespace Vdhicts\SVM\Models;

class TrainingScheduleTeamsOnLocations
{
    public function __construct(
        public TrainingScheduleLocation $location,
        public TrainingScheduleTeam $team,
    ) {
    }
}
