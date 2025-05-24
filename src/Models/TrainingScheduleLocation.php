<?php

namespace Vdhicts\SVM\Models;

use Vdhicts\SVM\Enums\FieldTypeEnum;

class TrainingScheduleLocation
{
    public function __construct(
        public FieldTypeEnum $fieldType,
        public string $id,
        public string $name,
        public int $order,
    ) {
    }
}
