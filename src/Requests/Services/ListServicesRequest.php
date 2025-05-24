<?php

namespace Vdhicts\SVM\Requests\Services;

use Vdhicts\SVM\Factories\ServiceFactory;
use Vdhicts\SVM\Models\Service;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListServicesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v2/services';
    }

    /**
     * @return Collection<Service>
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return $response
            ->collect()
            ->map(fn (array $data) => ServiceFactory::fromArray($data));
    }
}
