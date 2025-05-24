<?php

namespace Vdhicts\SVM\Models;

use Illuminate\Support\Collection;

class Committee
{
    /**
     * @param Collection<User> $users
     */
    public function __construct(
        public string $id,
        public string $name,
        public Collection $users,
    ) {
    }
}
