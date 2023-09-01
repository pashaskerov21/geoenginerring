<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'title.*' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'title.0.required' => 'başlıq az mütləqdir',
            'title.1.required' => 'başlıq tr mütləqdir',
            'title.2.required' => 'başlıq en mütləqdir',
            'title.3.required' => 'başlıq ru mütləqdir',
        ];
    }
}
