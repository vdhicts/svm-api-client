<?php

namespace Vdhicts\SVM\Requests\Results;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Enums\SeasonEnum;
use Vdhicts\SVM\Factories\PoolStandingFactory;
use Vdhicts\SVM\Models\PoolStanding;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class StandingsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private ?FieldTypeEnum $fieldType = null,
        private ?SeasonEnum $season = null,
        private ?string $teamId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/results/standings';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fieldType' => $this->fieldType?->value,
            'season' => $this->season?->value,
            'teamId' => $this->teamId,
        ]);
    }

    /**
     * @return Collection<string, PoolStanding>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        $data = collect();

        foreach ($response->json() as $competition => $result) {
            $data->put(
                key: $competition,
                value: PoolStandingFactory::fromArray($result),
            );
        }

        return $data;
    }
}
