<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarCreationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'model' => 'required|string',
            'mechanic_id' => 'required|numeric|min:1',
            'image' => 'required',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'model.required' => 'model is required, choose one',
            'model.string' => 'model must be text',
            'mechanic_id.required' => 'mechanic is required, choose one',
            'mechanic_id.numeric' => 'field must be number',
            'mechanic_id.min:1' => 'wrong value selected',
            'image' => 'image is required, upload one',
        ];
    }
}
