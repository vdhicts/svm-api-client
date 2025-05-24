<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Models\ShiftOnUser;
use Illuminate\Support\Arr;

class ShiftOnUserFactory
{
    public static function fromArray(array $data): ShiftOnUser
    {
        return new ShiftOnUser(
            user: UserFactory::fromArray(Arr::get($data, 'user')),
            contactGuardians: Arr::get($data, 'contactGuardians'),
        );
    }
}
