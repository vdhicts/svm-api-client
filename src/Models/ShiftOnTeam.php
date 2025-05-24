<?php

namespace Vdhicts\SVM\Models;

class ShiftOnTeam
{
    public function __construct(
        public TeamIdentifier $team,
    ) {
    }
}
