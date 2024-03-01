<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
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
            'name' => 'required|string|max:255', 
            'prefectures_id' => 'required|integer',
            'postalcode' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'tel' => 'required|string|max:12',            
        ];
    }
}
