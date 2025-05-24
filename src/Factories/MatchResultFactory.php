<?php

namespace Vdhicts\SVM\Factories;

use Carbon\Carbon;
use Vdhicts\SVM\Models\MatchResult;
use Illuminate\Support\Arr;

class MatchResultFactory
{
    public static function fromArray(array $data): MatchResult
    {
        return new MatchResult(
            id: Arr::get($data, 'id'),
            date: Carbon::parse(Arr::get($data, 'date')),
            homeTeamName: Arr::get($data, 'homeTeamName'),
            awayTeamName: Arr::get($data, 'awayTeamName'),
            result: Arr::get($data, 'result'),
        );
    }
}
