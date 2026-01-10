<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'phone' => 'required|digits_between:5,15',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,,webp|max:2048',
            'bio' => 'nullable|string|max:1000',
            'city' => 'nullable|string| max:100',
            'country' => 'nullable|string| max:100',
            'gender' => 'nullable|in:male,female',
            'experience' => 'nullable|string|max:1000',
        ];
    } 
}
