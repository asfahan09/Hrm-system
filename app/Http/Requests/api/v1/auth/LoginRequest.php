<?php

namespace App\Http\Requests\api\v1\auth;

use App\Domain\LoginDTO;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Builder\Function_;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:225',
            'password' => 'required|string|min:6',
        ];
    }

    public function toDto(): LoginDTO
    {
        return LoginDTO::fromArray($this->validated());
    }
}
