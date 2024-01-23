<?php

namespace App\Http\Resources\Strategies;

class LoginResponseStrategy implements UserResponseStrategy
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function format(): array
    {
        return [
            'access_token' => $this->user->token,
            'name'         => $this->user->first_name . ' ' . $this->user->last_name,
            'mobile'       => $this->user->mobile,
        ];
    }
}