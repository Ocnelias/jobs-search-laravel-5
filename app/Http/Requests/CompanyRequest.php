<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest {

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
            'title' => 'required|min:3|max:50',           
            'email' => 'email|unique:users,email',
            'phone' => 'unique:users,phone|max:20',
            'website' => 'active_url|max:50',
            'description' => 'required|min:50|max:3000',
            'agree' => 'accepted',
            
        ];
    }

    public function messages() {
        return [
            'title.required' => 'The Company name field is required.',
            'title.min' => 'The Company name must be at least 3 characters.',
            'title.max' => 'The Company name may not be greater than 50 characters.',
            
        ];
    }

}
