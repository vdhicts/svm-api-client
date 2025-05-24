<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Enums\PrivacyEnum;
use Vdhicts\SVM\Models\User;
use Illuminate\Support\Arr;

class UserFactory
{
    public static function fromArray(array $data): User
    {
        return new User(
            privacy: PrivacyEnum::from(Arr::get($data, 'privacy')),
            fullName: Arr::get($data, 'fullName'),
        );
    }
}
