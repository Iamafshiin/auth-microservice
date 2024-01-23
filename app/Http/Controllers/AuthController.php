<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request): object
    {
        try {
            $this->validate($request, [
                'mobile'   => 'required|max:11',
                'password' => 'required',
            ]);
            return $this->authService->authentication($request->only('mobile', 'password'));
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 400);
        }
    }

    public function logout(Request $request) : object
    {
        try {
            $header = $request->header('Authorization');
            return $this->authService->userLogout($header);
        } catch (\Throwable $th) {
            response()->json(['error' => "An error occured"], 400);
        }
    }
}
