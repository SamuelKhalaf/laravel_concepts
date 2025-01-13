<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class offerRequest extends FormRequest
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
            'name'        => 'required|max:10|unique:offers,name',
            'description' => 'required|max:100',
            'price'       => 'required|numeric',
            'status'      => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => __('messages.offer_name_required'),
            'name.max'             => __('messages.offer_name_max'),
            'name.unique'          => __('messages.offer_name_unique'),
            'description.required' => __('messages.offer_description_required'),
            'description.max'      => __('messages.offer_description_max'),
            'price.required'       => __('messages.offer_price_required'),
            'price.numeric'        => __('messages.offer_price_numeric'),
            'status.required'      => __('messages.offer_status_required'),
        ];
    }
}
