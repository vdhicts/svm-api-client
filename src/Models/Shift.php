<?php

namespace Vdhicts\SVM\Models;

use Carbon\CarbonInterface;
use Illuminate\Support\Collection;

class Shift
{
    /**
     * @param Collection<ShiftOnUser> $users
     * @param Collection<ShiftOnTeam> $teams
     */
    public function __construct(
        public string $id,
        public CarbonInterface $date,
        public string $startTime,
        public string $endTime,
        public string $serviceId,
        public int $requiredUsers,
        public Collection $users,
        public Collection $teams,
        public ?array $extraData = [],
    ) {
    }
}
