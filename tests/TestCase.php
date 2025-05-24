<?php

namespace Vdhicts\SVM\Tests;

use Saloon\Config;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use Vdhicts\SVM\SVMConnector;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected SVMConnector $connector;

    protected function setUp(): void
    {
        parent::setUp();

        $this->initializeConnector();
    }

    private function getMockClient(): MockClient
    {
        return new MockClient([
            '*' => function (PendingRequest $pendingRequest) {
                $requestName = get_class($pendingRequest->getRequest());

                $fixture = substr($requestName, strrpos($requestName, '\\') + 1);

                return MockResponse::make(file_get_contents(__DIR__ . '/Fixtures/' . $fixture . '.json'));
            },
        ]);
    }

    private function initializeConnector(): void
    {
        // Prevent requests from being sent to the real API
        Config::preventStrayRequests();

        $this->connector = new SVMConnector('my-test-token');
        $this->connector->withMockClient($this->getMockClient());
    }
}
