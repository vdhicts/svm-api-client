<?php

namespace Vdhicts\SVM\Tests\Feature\Requests\TrainingSchedules;

use Vdhicts\SVM\Tests\TestCase;

class ListTrainingScheduleForTeamRequestTest extends TestCase
{
    public function test_list_teams_request(): void
    {
        $response = $this
            ->connector
            ->trainingSchedules()
            ->listByTeam('c740ac16-3ace-4178-bbc6-ed51c213e3ca');

        $this->assertSame($response->outdoorSlots->count(), 0);
        $this->assertSame($response->indoorSlots->count(), 2);
        $this->assertSame($response->locations->count(), 2);
    }
}
