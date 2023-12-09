<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppContentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'required|string',
            'type'     => 'required|string',
            'local'     => 'required',
        ];
    }

    public function messages(){
        return [
            'content.required'          =>  __('words.content_required_validation'),
            'type.required'             =>  __('words.type_required_validation'),
            'local.required'            =>  __('words.local_required_validation'),
            'countries_id.required'     =>  __('words.country_required_validation'),
        ];
    }
}
