<?php

namespace Vdhicts\SVM\Tests\Feature\Requests\Services;

use Vdhicts\SVM\Tests\TestCase;

class ListServicesRequestTest extends TestCase
{
    public function test_list_request(): void
    {
        $response = $this
            ->connector
            ->services()
            ->list();

        $this->assertSame($response->count(), 0);
    }
}
