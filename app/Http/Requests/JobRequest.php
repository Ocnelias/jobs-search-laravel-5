<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'position' => 'required|min:3|max:50',           
            'description' => 'required|min:50|max:3000',
            'salary' => 'max:10',
            'agree' => 'accepted',
            
        ];
    }

    public function messages() {
        return [
            
        ];
    }

}
