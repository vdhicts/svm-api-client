<?php

namespace Vdhicts\SVM\Models;

class Accommodation
{
    public function __construct(
        public string $name,
        public ?string $route = null,
    ) {
    }
}
