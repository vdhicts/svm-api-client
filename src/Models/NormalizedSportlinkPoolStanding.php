<?php

namespace Vdhicts\SVM\Models;

class NormalizedSportlinkPoolStanding
{
    public function __construct(
        public int $position,
        public int $played,
        public int $won,
        public int $draw,
        public int $lost,
        public int $goalsFor,
        public int $goalsAgainst,
        public int $goalDifference,
        public int $points,
        public int $lossPoints,
        public bool $isHomeTeam,
        public string $teamName,
        public string $providerId,
    ) {
    }
}
