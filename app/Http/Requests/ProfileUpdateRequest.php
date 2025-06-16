<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'city' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'in:admin,organizer,participant'],
            'cnic' => ['nullable', 'string', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone_number' => ['nullable', 'string', 'max:15'],
            'player_role' => ['nullable', 'in:batsman,bowler,all-rounder'],
            'age' => ['nullable', 'integer', 'min:0'],
            'location' => ['nullable', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'max:2048'], // For file uploads
            'verification_status' => ['nullable', 'boolean'],
            'organizer_status' => ['nullable', 'in:accepted,rejected,pending'],
        ];
    }
}
