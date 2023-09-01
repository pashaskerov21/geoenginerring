<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryRequest extends FormRequest
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
            'name.*' => 'required',
        ];
    }
    public function messages(){
        return [
            'name.0.required' => 'name az mütləqdir',
            'name.1.required' => 'name tr mütləqdir',
            'name.2.required' => 'name en mütləqdir',
            'name.3.required' => 'name ru mütləqdir',
        ];
    }
}
