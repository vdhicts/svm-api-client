<?php

namespace Vdhicts\SVM;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Saloon\Traits\Plugins\HasTimeout;

/**
 * @see https://app.sportclubvrijwilligersmanagement.nl/association/api
 * @see https://api.sportclubvrijwilligersmanagement.nl/docs-json
 * @see https://api.sportclubvrijwilligersmanagement.nl/docs
 */
class SVMConnector extends Connector
{
    use AlwaysThrowOnErrors;
    use AcceptsJson;
    use HasTimeout;

    protected int $connectTimeout = 10;

    protected int $requestTimeout = 30;

    public function __construct(
        protected readonly string $token,
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.sportclubvrijwilligersmanagement.nl';
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }

    public function committees(): Resources\Committees
    {
        return new Resources\Committees($this);
    }

    public function programs(): Resources\Programs
    {
        return new Resources\Programs($this);
    }

    public function results(): Resources\Results
    {
        return new Resources\Results($this);
    }

    public function services(): Resources\Services
    {
        return new Resources\Services($this);
    }

    public function teams(): Resources\Teams
    {
        return new Resources\Teams($this);
    }

    public function trainingSchedules(): Resources\TrainingSchedules
    {
        return new Resources\TrainingSchedules($this);
    }
}
