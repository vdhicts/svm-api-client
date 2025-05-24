<?php

namespace Vdhicts\SVM\Requests\TrainingSchedules;

use Vdhicts\SVM\Factories\TrainingScheduleFactory;
use Vdhicts\SVM\Models\TrainingSchedule;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class ListTrainingScheduleForTeamRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private string $teamId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/v1/training-schedules/' . $this->teamId;
    }

    public function createDtoFromResponse(Response $response): TrainingSchedule
    {
        return TrainingScheduleFactory::fromArray($response->json());
    }
}
