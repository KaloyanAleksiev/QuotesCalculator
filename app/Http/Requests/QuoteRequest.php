<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'ship_from' => [
                'required',
                'regex:/^[0-9]{6,6}$/'
            ],
            'deliver_to' => [
                'required',
                'regex:/^[0-9]{6,6}+$/'
            ],
            'transport' => [
                'required',
                'integer',
                'in:0,1'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ship_from.regex' => 'Please enter a six digits number',
            'deliver_to.regex' => 'Please enter a six digits number',
        ];
    }
}
