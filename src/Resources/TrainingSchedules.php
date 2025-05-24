<?php

namespace Vdhicts\SVM\Resources;

use Vdhicts\SVM\Models\TrainingSchedule;
use Vdhicts\SVM\Requests\TrainingSchedules\ListTrainingScheduleForTeamRequest;
use Vdhicts\SVM\Requests\TrainingSchedules\ListTrainingSchedulesRequest;
use LogicException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class TrainingSchedules extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function list(): TrainingSchedule
    {
        return $this
            ->connector
            ->send(new ListTrainingSchedulesRequest())
            ->dtoOrFail();
    }


    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws LogicException
     */
    public function listByTeam(string $teamId): TrainingSchedule
    {
        return $this
            ->connector
            ->send(new ListTrainingScheduleForTeamRequest($teamId))
            ->dtoOrFail();
    }
}
