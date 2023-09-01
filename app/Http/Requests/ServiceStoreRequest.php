<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
            'icon' => 'required|image|mimes:png,jpg,jpeg,svg',
            'card_img_1' => 'required|image|mimes:png,jpg,jpeg,svg',
            'card_img_2' => 'required|image|mimes:png,jpg,jpeg,svg',
            'text_img' => 'required|image|mimes:png,jpg,jpeg,svg',
            'catalog_pdf' => 'mimes:pdf',
        ];
    }
    public function messages()
    {
        return[
            'title.0.required' => 'title az mütləqdir',
            'title.1.required' => 'title tr mütləqdir',
            'title.2.required' => 'title en mütləqdir',
            'title.3.required' => 'title ru mütləqdir',
        ];
    }
}
