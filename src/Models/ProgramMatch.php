<?php

namespace Vdhicts\SVM\Models;

use Carbon\CarbonInterface;
use Illuminate\Support\Collection;

class ProgramMatch
{
    /**
     * @param Collection<User> $transporterAssignment
     * @param Collection<User> $reserveAssignments
     */
    public function __construct(
        public CarbonInterface $date,
        public ?Accommodation $accommodation,
        public string $attendanceTime,
        public string $id,
        public Collection $transporterAssignment,
        public string $homeTeamName,
        public string $awayTeamName,
        public bool $isPracticeMatch,
        public bool $isHomeMatch,
        public Collection $reserveAssignments,
        public bool $isCompetitiveMatch,
        public ?string $fieldName = null,
        public ?MatchRefereeAssignment $refereeAssignment = null,
        public ?MatchRefereeAssignment $reserveRefereeAssignment = null,
        public ?string $refereeProviderName = null,
        public ?TeamIdentifier $awayTeam = null,
        public ?TeamIdentifier $homeTeam = null,
        public ?string $notes = null,
    ) {
    }
}
