<?php

namespace Vdhicts\SVM\Requests\Programs;

use Carbon\CarbonInterface;
use Vdhicts\SVM\Enums\LocationEnum;
use Vdhicts\SVM\Enums\SortByEnum;
use Vdhicts\SVM\Factories\ProgramMatchFactory;
use Vdhicts\SVM\Models\ProgramMatch;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListPracticeMatchesForTeamRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $teamId,
        private ?CarbonInterface $date = null,
        private ?LocationEnum $location = null,
        private ?SortByEnum $sortBy = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/v1/programs/practice-matches/%s', $this->teamId);
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date?->format('Y-m-d'),
            'location' => $this->location?->value,
            'sortBy' => $this->sortBy?->value,
        ]);
    }

    /**
     * @return Collection<string, ProgramMatch>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        $data = collect();

        foreach ($response->json() as $dateString => $result) {
            $data->put(
                key: $dateString,
                value: ProgramMatchFactory::fromArray($result),
            );
        }

        return $data;
    }
}
