<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'category_id' => 'required',
            'title.*' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
        ];
    }
    public function messages()
    {
        return[
            'category_id.required' => 'kateqoriya seçin',
            'title.0.required' => 'title az mütləqdir',
            'title.1.required' => 'title tr mütləqdir',
            'title.2.required' => 'title en mütləqdir',
            'title.3.required' => 'title ru mütləqdir',
        ];
    }
}
