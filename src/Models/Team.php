<?php

namespace Vdhicts\SVM\Models;

use Vdhicts\SVM\Enums\FieldTypeEnum;
use Illuminate\Support\Collection;

class Team
{
    public function __construct(
        public string $id,
        public string $name,
        public FieldTypeEnum $fieldType,
        public Collection $coaches,
        public Collection $players,
        public Collection $managers,
        public Collection $otherMembers,
    ) {
    }
}
