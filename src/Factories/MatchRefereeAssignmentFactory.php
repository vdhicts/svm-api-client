<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\MatchRefereeAssignment;
use Illuminate\Support\Arr;

class MatchRefereeAssignmentFactory
{
    public static function fromArray(array $data): MatchRefereeAssignment
    {
        $user = Arr::get($data, 'user');
        $team = Arr::get($data, 'team');

        return new MatchRefereeAssignment(
            user: $user !== null
                ? UserFactory::fromArray($user)
                : null,
            team: $team !== null
                ? TeamIdentifierFactory::fromArray($team)
                : null,
        );
    }
}
