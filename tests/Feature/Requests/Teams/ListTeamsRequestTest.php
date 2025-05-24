<?php

namespace Vdhicts\SVM\Tests\Feature\Requests\Teams;

use Vdhicts\SVM\Models\Team;
use Vdhicts\SVM\Tests\TestCase;

class ListTeamsRequestTest extends TestCase
{
    public function test_list_teams_request(): void
    {
        $response = $this
            ->connector
            ->teams()
            ->list();

        $this->assertInstanceOf(Team::class, $response->first());
        $this->assertSame($response->count(), 2);
        $this->assertSame($response->first()->name, 'SVM 1');
    }
}
