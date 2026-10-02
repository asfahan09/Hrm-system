<?php

namespace App\Http\Controllers\api\v1\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\auth\LoginRequest;
use App\Http\Responses\ApiResponse;
use App\Http\Services\AuthService;
use GuzzleHttp\Psr7\Request;

class AuthController extends Controller
{
    public function __construct(
        private readonly  AuthService $authService
    ) {}

    public function login(LoginRequest $request)
    {
        $result = $this->authService->login($request->toDto());
        return ApiResponse::success($result,"Login Successfull");
    }

    public function logout(LogoutRequest $logoutrequest){

    }
}

