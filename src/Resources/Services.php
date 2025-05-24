<?php

namespace Vdhicts\SVM\Resources;

use Carbon\CarbonInterface;
use Vdhicts\SVM\Models\Service;
use Vdhicts\SVM\Models\Shift;
use Vdhicts\SVM\Requests\Services\GetServicesForTypeRequest;
use Vdhicts\SVM\Requests\Services\ListBarServiceRequest;
use Vdhicts\SVM\Requests\Services\ListServiceAttendantsRequest;
use Vdhicts\SVM\Requests\Services\ListServicesRequest;
use Illuminate\Support\Collection;
use LogicException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class Services extends BaseResource
{
    /**
     * @return Collection<Service>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function list(): Collection
    {
        return $this
            ->connector
            ->send(new ListServicesRequest())
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, Shift>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function get(string $type, ?CarbonInterface $date = null): Collection
    {
        return $this
            ->connector
            ->send(new GetServicesForTypeRequest(
                type: $type,
                date: $date,
            ))
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, Collection<Shift>>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function attendants(?CarbonInterface $date = null): Collection
    {
        return $this
            ->connector
            ->send(new ListServiceAttendantsRequest(
                date: $date,
            ))
            ->dtoOrFail();
    }

    /**
     * @return Collection<string, Collection<Shift>>
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function bar(?CarbonInterface $date = null): Collection
    {
        return $this
            ->connector
            ->send(new ListBarServiceRequest(
                date: $date,
            ))
            ->dtoOrFail();
    }
}
