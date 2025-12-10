<?php

namespace Vdhicts\SVM\Requests\Results;

use Vdhicts\SVM\Factories\MatchResultFactory;
use Vdhicts\SVM\Models\MatchResult;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListResultsRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private ?string $teamId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/results';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'teamId' => $this->teamId,
        ]);
    }

    /**
     * @return Collection<string, MatchResult>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        $data = collect();

        foreach ($response->json() as $dateString => $results) {
            $data->put(
                key: $dateString,
                value: array_map(
                    fn (array $resultData) => MatchResultFactory::fromArray($resultData),
                    $results,
                ),
            );
        }

        return $data;
    }
}
