<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\Committee;
use Vdhicts\SVM\Models\User;
use Illuminate\Support\Arr;

class CommitteeFactory
{
    public static function fromArray(array $data): Committee
    {
        return new Committee(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            users: collect(Arr::get($data, 'users'))->map(fn (array $user): User => UserFactory::fromArray(Arr::get($user, 'user'))),
        );
    }
}
