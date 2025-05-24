<?php

namespace Vdhicts\SVM\Models;

class ShiftOnUser
{
    public function __construct(
        public User $user,
        public bool $contactGuardians,
    ) {
    }
}
