<?php

namespace Vdhicts\SVM\Tests\Feature\Requests\Services;

use Vdhicts\SVM\Tests\TestCase;

class ListBarServiceRequestTest extends TestCase
{
    public function test_list_request(): void
    {
        $response = $this
            ->connector
            ->services()
            ->bar();

        $this->assertSame($response->count(), 1);
        $this->assertSame($response->first()->first()->teams->count(), 1);
        $this->assertSame($response->first()->first()->users->count(), 0);
    }
}
