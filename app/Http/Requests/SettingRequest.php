<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'image|mimes:png,jpg,jpeg,svg,webp',
            'logo_white' => 'image|mimes:png,jpg,jpeg,svg,webp',
            'favicon' => 'image|mimes:png,jpg,jpeg,svg,webp',
            'favicon_white' => 'image|mimes:png,jpg,jpeg,svg,webp',
        ];
    }
}
