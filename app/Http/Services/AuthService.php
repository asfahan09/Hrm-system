<?php

namespace App\Http\Services;

use App\Domain\LoginDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(LoginDTO $loginDTO)
    {
        $user = User::with('employee')->where('email', $loginDTO->email)->first();
        if (!$user || !Hash::check($loginDTO->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ["The provided credentials are incorrect"]
            ]);
        }

        $token = $user->createToken('auth-token')->plainTextToken;
        return [
            'token' => $token,

            'user' => [
                'id' => $user->id,
                'employee_id' => $user->employee->id,
                'name' => $user->name,
                'email' => $user->email,
                'roles' => $user->roles->pluck('name'),
                'permissions' => $user->getAllPermissions()->pluck('name'),
            ],
        ];
    }

    public function logout(User $user){
    $user->currentAccessToken()->delete();
    }
}
