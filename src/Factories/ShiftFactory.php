<?php

namespace Vdhicts\SVM\Factories;

use Carbon\Carbon;
use Vdhicts\SVM\Models\Shift;
use Vdhicts\SVM\Models\ShiftOnTeam;
use Vdhicts\SVM\Models\ShiftOnUser;
use Illuminate\Support\Arr;

class ShiftFactory
{
    public static function fromArray(array $data): Shift
    {
        return new Shift(
            id: Arr::get($data, 'id'),
            date: Carbon::parse(Arr::get($data, 'date')),
            startTime: Arr::get($data, 'startTime'),
            endTime: Arr::get($data, 'endTime'),
            serviceId: Arr::get($data, 'serviceId'),
            requiredUsers: Arr::get($data, 'requiredUsers'),
            users: collect(Arr::get($data, 'users'))->map(fn (array $user): ShiftOnUser => ShiftOnUserFactory::fromArray($user)),
            teams: collect(Arr::get($data, 'teams'))->map(fn (array $team): ShiftOnTeam => ShiftOnTeamFactory::fromArray($team)),
            extraData: Arr::get($data, 'extraData'),
        );
    }
}
