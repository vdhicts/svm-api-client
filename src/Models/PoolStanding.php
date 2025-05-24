<?php

namespace Vdhicts\SVM\Models;

use Vdhicts\SVM\Enums\SeasonEnum;
use Illuminate\Support\Collection;

class PoolStanding
{
    /**
     * @param Collection<NormalizedSportlinkPoolStanding> $standings
     */
    public function __construct(
        public Collection $standings,
        public string $name,
        public ?SeasonEnum $season = null,
    ) {
    }
}
