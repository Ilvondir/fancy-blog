<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return !Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => ["nullable", "min:2"],
            "last_name" => ["nullable", "min:2"],
            "login" => ["required", "unique:users,login"],
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()],
            "role_id" => ["required", "integer"]
        ];
    }
}