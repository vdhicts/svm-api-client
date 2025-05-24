<?php

namespace Vdhicts\SVM\Models;

class MatchRefereeAssignment
{
    public function __construct(
        public ?User $user = null,
        public ?TeamIdentifier $team = null,
    ) {
    }
}
