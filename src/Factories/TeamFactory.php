<?php

namespace Vdhicts\SVM\Factories;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Vdhicts\SVM\Models\Team;
use Vdhicts\SVM\Models\User;
use Illuminate\Support\Arr;

class TeamFactory
{
    public static function fromArray(array $data): Team
    {
        return new Team(
            id: Arr::get($data, 'id'),
            name: Arr::get($data, 'name'),
            fieldType: FieldTypeEnum::from(Arr::get($data, 'fieldType')),
            coaches: collect(Arr::get($data, 'coaches'))->map(fn (array $coach): User => UserFactory::fromArray(Arr::get($coach, 'user'))),
            players: collect(Arr::get($data, 'players'))->map(fn (array $coach): User => UserFactory::fromArray(Arr::get($coach, 'user'))),
            managers: collect(Arr::get($data, 'managers'))->map(fn (array $coach): User => UserFactory::fromArray(Arr::get($coach, 'user'))),
            otherMembers: collect(Arr::get($data, 'otherMembers'))->map(fn (array $coach): User => UserFactory::fromArray(Arr::get($coach, 'user'))),
        );
    }
}
