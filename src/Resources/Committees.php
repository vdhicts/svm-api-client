<?php

namespace Vdhicts\SVM\Resources;

use Vdhicts\SVM\Models\Committee;
use Vdhicts\SVM\Requests\Committees\ListCommitteesRequest;
use Illuminate\Support\Collection;
use LogicException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class Committees extends BaseResource
{
    /**
     * @return Collection<Committee>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function list(): Collection
    {
        return $this
            ->connector
            ->send(new ListCommitteesRequest())
            ->dtoOrFail();
    }
}
