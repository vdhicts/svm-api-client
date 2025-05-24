<?php

namespace Vdhicts\SVM\Resources;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Enums\SeasonEnum;
use Vdhicts\SVM\Models\MatchResult;
use Vdhicts\SVM\Models\PoolStanding;
use Vdhicts\SVM\Requests\Results\ListResultsRequest;
use Vdhicts\SVM\Requests\Results\StandingsRequest;
use Illuminate\Support\Collection;
use LogicException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class Results extends BaseResource
{
    /**
     * @return Collection<string, MatchResult>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function list(?string $teamId = null): Collection
    {
        return $this
            ->connector
            ->send(new ListResultsRequest($teamId))
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, PoolStanding>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function standings(
        ?FieldTypeEnum $fieldType = null,
        ?SeasonEnum $season = null,
        ?string $teamId = null
    ): Collection {
        return $this
            ->connector
            ->send(new StandingsRequest(
                fieldType: $fieldType,
                season: $season,
                teamId: $teamId,
            ))
            ->dtoOrFail();
    }
}
