<?php

namespace Vdhicts\SVM\Models;

use Carbon\CarbonInterface;

class MatchResult
{
    public function __construct(
        public string $id,
        public CarbonInterface $date,
        public string $homeTeamName,
        public string $awayTeamName,
        public string $result,
    ) {
    }
}
