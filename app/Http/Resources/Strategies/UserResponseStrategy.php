<?php

namespace App\Http\Resources\Strategies;

interface UserResponseStrategy
{
    public function format(): array;
}
