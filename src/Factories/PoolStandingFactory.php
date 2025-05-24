<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Enums\SeasonEnum;
use Vdhicts\SVM\Models\NormalizedSportlinkPoolStanding;
use Vdhicts\SVM\Models\PoolStanding;
use Illuminate\Support\Arr;

class PoolStandingFactory
{
    public static function fromArray(array $data): PoolStanding
    {
        return new PoolStanding(
            standings: collect(Arr::get($data, 'standings'))->map(fn (array $standing): NormalizedSportlinkPoolStanding => NormalizedSportlinkPoolStandingFactory::fromArray($standing)),
            name: Arr::get($data, 'name'),
            season: SeasonEnum::tryFrom(Arr::get($data, 'season') ?? ''),
        );
    }
}
