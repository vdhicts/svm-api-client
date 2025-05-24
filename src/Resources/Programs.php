<?php

namespace Vdhicts\SVM\Resources;

use Carbon\CarbonInterface;
use Vdhicts\SVM\Enums\LevelTypeEnum;
use Vdhicts\SVM\Enums\LocationEnum;
use Vdhicts\SVM\Enums\SortByEnum;
use Vdhicts\SVM\Models\ProgramMatch;
use Vdhicts\SVM\Requests\Programs\ListPracticeMatchesForTeamRequest;
use Vdhicts\SVM\Requests\Programs\ListPracticeMatchesRequest;
use Vdhicts\SVM\Requests\Programs\ListProgramForTeamRequest;
use Vdhicts\SVM\Requests\Programs\ListProgramRequest;
use Illuminate\Support\Collection;
use LogicException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class Programs extends BaseResource
{
    /**
     * @return Collection<string, ProgramMatch>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function program(
        ?CarbonInterface $date = null,
        ?bool $reserves = null,
        ?LocationEnum $location = null,
        ?LevelTypeEnum $levelType = null,
        ?SortByEnum $sortBy = null,
    ): Collection {
        return $this
            ->connector
            ->send(new ListProgramRequest(
                date: $date,
                reserves: $reserves,
                location: $location,
                levelType: $levelType,
                sortBy: $sortBy,
            ))
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, ProgramMatch>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function programForTeam(
        string $teamId,
        ?CarbonInterface $date = null,
        ?bool $reserves = null,
        ?LocationEnum $location = null,
        ?LevelTypeEnum $levelType = null,
        ?SortByEnum $sortBy = null,
    ): Collection {
        return $this
            ->connector
            ->send(new ListProgramForTeamRequest(
                teamId: $teamId,
                date: $date,
                reserves: $reserves,
                location: $location,
                levelType: $levelType,
                sortBy: $sortBy,
            ))
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, ProgramMatch>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function practiceMatches(
        ?CarbonInterface $date = null,
        ?LocationEnum $location = null,
        ?SortByEnum $sortBy = null,
    ): Collection {
        return $this
            ->connector
            ->send(new ListPracticeMatchesRequest(
                date: $date,
                location: $location,
                sortBy: $sortBy,
            ))
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, ProgramMatch>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function practiceMatchesForTeam(
        string $teamId,
        ?CarbonInterface $date = null,
        ?LocationEnum $location = null,
        ?SortByEnum $sortBy = null,
    ): Collection {
        return $this
            ->connector
            ->send(new ListPracticeMatchesForTeamRequest(
                teamId: $teamId,
                date: $date,
                location: $location,
                sortBy: $sortBy,
            ))
            ->dtoOrFail();
    }
}
