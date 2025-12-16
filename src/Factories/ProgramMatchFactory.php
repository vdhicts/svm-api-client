<?php

namespace Vdhicts\SVM\Factories;

use Carbon\Carbon;
use Vdhicts\SVM\Models\ProgramMatch;
use Vdhicts\SVM\Models\User;
use Illuminate\Support\Arr;

class ProgramMatchFactory
{
    public static function fromArray(array $data): ProgramMatch
    {
        $refereeAssignment = Arr::get($data, 'refereeAssignment');
        if ($refereeAssignment !== null) {
            $refereeAssignment = MatchRefereeAssignmentFactory::fromArray($refereeAssignment);
        }

        $reserveRefereeAssignment = Arr::get($data, 'reserveRefereeAssignment');
        if ($reserveRefereeAssignment !== null) {
            $reserveRefereeAssignment = MatchRefereeAssignmentFactory::fromArray($reserveRefereeAssignment);
        }

        $awayTeam = Arr::get($data, 'awayTeam');
        if ($awayTeam !== null) {
            $awayTeam = TeamIdentifierFactory::fromArray($awayTeam);
        }

        $homeTeam = Arr::get($data, 'homeTeam');
        if ($homeTeam !== null) {
            $homeTeam = TeamIdentifierFactory::fromArray($homeTeam);
        }

        return new ProgramMatch(
            date: Carbon::parse(Arr::get($data, 'date')),
            accommodation: Arr::get($data, 'accommodation') === null
                ? null
                : AccommodationFactory::fromArray(Arr::get($data, 'accommodation')),
            attendanceTime: Arr::get($data, 'attendanceTime'),
            id: Arr::get($data, 'id'),
            transporterAssignment: collect(Arr::get($data, 'transporterAssignments'))->map(fn (array $transporter): User => UserFactory::fromArray(Arr::get($transporter, 'user'))),
            homeTeamName: Arr::get($data, 'homeTeamName'),
            awayTeamName: Arr::get($data, 'awayTeamName'),
            isPracticeMatch: Arr::get($data, 'isPracticeMatch'),
            isHomeMatch: Arr::get($data, 'isHomeMatch'),
            reserveAssignments: collect(Arr::get($data, 'reserveAssignments'))->map(fn (array $reserve): User => UserFactory::fromArray(Arr::get($reserve, 'user'))),
            isCompetitiveMatch: Arr::get($data, 'isCompetitiveMatch'),
            fieldName: Arr::get($data, 'fieldName'),
            refereeAssignment: $refereeAssignment,
            reserveRefereeAssignment: $reserveRefereeAssignment,
            refereeProviderName: Arr::get($data, 'refereeProviderName'),
            awayTeam: $awayTeam,
            homeTeam: $homeTeam,
            notes: Arr::get($data, 'notes'),
        );
    }
}
