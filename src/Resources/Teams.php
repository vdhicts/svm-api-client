<?php

namespace Vdhicts\SVM\Resources;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Models\TeamIdentifier;
use Vdhicts\SVM\Requests\Teams\ListTeamsRequest;
use Illuminate\Support\Collection;
use LogicException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class Teams extends BaseResource
{
    /**
     * @return Collection<TeamIdentifier>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function list(?FieldTypeEnum $fieldTypeEnum = null, ?string $teamId = null): Collection
    {
        return $this
            ->connector
            ->send(new ListTeamsRequest(
                fieldTypeEnum: $fieldTypeEnum,
                teamId: $teamId,
            ))
            ->dtoOrFail();
    }
}
