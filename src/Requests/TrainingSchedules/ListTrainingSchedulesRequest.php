<?php

namespace Vdhicts\SVM\Requests\TrainingSchedules;

use Vdhicts\SVM\Factories\TrainingScheduleFactory;
use Vdhicts\SVM\Models\TrainingSchedule;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListTrainingSchedulesRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/v1/training-schedules';
    }

    public function createDtoFromResponse(Response $response): TrainingSchedule
    {
        return TrainingScheduleFactory::fromArray($response->json());
    }
}
