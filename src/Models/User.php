<?php

namespace Vdhicts\SVM\Models;

use Vdhicts\SVM\Enums\PrivacyEnum;

class User
{
    public function __construct(
        public PrivacyEnum $privacy,
        public string $fullName,
    ) {
    }
}
