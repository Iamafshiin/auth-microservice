<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(array $data) : User
    {
        try {
            return User::create($data);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function loginAttempt($credentials) : string
    {
        try {
            return Auth::attempt($credentials);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function getAuthenticatedUser() : User
    {
        try {
            return Auth::user();
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}