<?php

namespace Vdhicts\SVM\Requests\Services;

use Carbon\CarbonInterface;
use Vdhicts\SVM\Factories\ShiftFactory;
use Vdhicts\SVM\Models\Shift;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListBarServiceRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private ?CarbonInterface $date = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/services/bar';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date?->format('Y-m-d'),
        ]);
    }

    /**
     * @return Collection<string, Collection<Shift>>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        $data = collect();

        foreach ($response->json() as $dateString => $shifts) {
            $data->put(
                key: $dateString,
                value: collect($shifts)->map(fn (array $shift) => ShiftFactory::fromArray($shift)),
            );
        }

        return $data;
    }
}
