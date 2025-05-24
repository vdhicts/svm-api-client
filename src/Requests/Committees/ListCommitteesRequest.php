<?php

namespace Vdhicts\SVM\Requests\Committees;

use Vdhicts\SVM\Factories\CommitteeFactory;
use Vdhicts\SVM\Models\Committee;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListCommitteesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/committees';
    }

    /**
     * @return Collection<Committee>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response
            ->collect()
            ->map(fn (array $data) => CommitteeFactory::fromArray($data));
    }
}
