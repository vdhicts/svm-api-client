<?php

namespace Vdhicts\SVM\Requests\Programs;

use Carbon\CarbonInterface;
use Vdhicts\SVM\Enums\LevelTypeEnum;
use Vdhicts\SVM\Enums\LocationEnum;
use Vdhicts\SVM\Enums\SortByEnum;
use Vdhicts\SVM\Factories\ProgramMatchFactory;
use Vdhicts\SVM\Models\ProgramMatch;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListProgramForTeamRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $teamId,
        private ?CarbonInterface $date = null,
        private ?bool $reserves = null,
        private ?LocationEnum $location = null,
        private ?LevelTypeEnum $levelType = null,
        private ?SortByEnum $sortBy = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/v1/programs/%s', $this->teamId);
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date?->format('Y-m-d'),
            'reserves' => $this->reserves ? 'true' : 'false',
            'location' => $this->location?->value,
            'levelType' => $this->levelType?->value,
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
