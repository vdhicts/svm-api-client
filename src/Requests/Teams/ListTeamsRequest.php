<?php

namespace Vdhicts\SVM\Requests\Teams;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Factories\TeamFactory;
use Vdhicts\SVM\Factories\TeamIdentifierFactory;
use Vdhicts\SVM\Models\Team;
use Vdhicts\SVM\Models\TeamIdentifier;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListTeamsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private ?FieldTypeEnum $fieldTypeEnum = null,
        private ?string $teamId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/teams';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fieldType' => $this->fieldTypeEnum?->value,
            'teamId' => $this->teamId,
        ]);
    }

    /**
     * @return Collection<Team>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response
            ->collect()
            ->map(fn (array $data) => TeamFactory::fromArray($data));
    }
}
