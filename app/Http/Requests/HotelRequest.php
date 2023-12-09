<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'type_1' => 'required|string',
            'type_2' => 'required|string',
            'type_3' => 'required|string',
            'type_4' => 'required|string',
            'price_1' => 'required|string',
            'price_2' => 'required|string',
            'price_3' => 'required|string',
            'price_4' => 'required|string',
            'event_id' => 'required|numeric|min:1',
        ];
    }
}
