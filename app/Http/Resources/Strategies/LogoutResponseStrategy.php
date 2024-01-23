<?php

namespace App\Http\Resources\Strategies;

class LogoutResponseStrategy implements UserResponseStrategy
{
    public function format(): array
    {
        return ['message' => 'Successfully logged out'];
    }
}