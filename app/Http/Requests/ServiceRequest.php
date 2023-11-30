<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $isUpdateRequest = $this->isMethod('put');
        return [
            'title.*' => 'required',
            'icon' => [
                $isUpdateRequest ? 'sometimes' : 'required',
                'image',
                'mimes:png,jpg,jpeg,svg,webp',
            ],
            'card_img_1' => [
                $isUpdateRequest ? 'sometimes' : 'required',
                'image',
                'mimes:png,jpg,jpeg,svg,webp',
            ],
            'card_img_2' => [
                $isUpdateRequest ? 'sometimes' : 'required',
                'image',
                'mimes:png,jpg,jpeg,svg,webp',
            ],
            'text_img' => [
                $isUpdateRequest ? 'sometimes' : 'required',
                'image',
                'mimes:png,jpg,jpeg,svg,webp',
            ],
            'catalog_pdf' => 'mimes:pdf',
        ];
    }
}
