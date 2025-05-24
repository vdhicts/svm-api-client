<?php

namespace Vdhicts\SVM\Requests\Services;

use Carbon\CarbonInterface;
use Vdhicts\SVM\Factories\ShiftFactory;
use Vdhicts\SVM\Models\Shift;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetServicesForTypeRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $type,
        private ?CarbonInterface $date = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return sprintf('/v2/services/%s', $this->type);
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'date' => $this->date?->format('Y-m-d'),
        ]);
    }

    /**
     * @return Collection<Shift>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        $data = collect();

        foreach ($response->json() as $key => $shift) {
            $data->put(
                key: $key,
                value: ShiftFactory::fromArray($shift),
            );
        }

        return $data;
    }
}
