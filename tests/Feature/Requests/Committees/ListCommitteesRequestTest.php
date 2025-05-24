<?php

namespace Vdhicts\SVM\Tests\Feature\Requests\Committees;

use Vdhicts\SVM\Models\Committee;
use Vdhicts\SVM\Tests\TestCase;

class ListCommitteesRequestTest extends TestCase
{
    public function test_list_committees_request(): void
    {
        $response = $this
            ->connector
            ->committees()
            ->list();

        $this->assertInstanceOf(Committee::class, $response->first());
        $this->assertSame($response->first()->users->count(), 3);
        $this->assertSame($response->first()->users->first()->fullName, 'Ursula von der Leyen');
    }
}
