<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest {

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
//            'contact_email' => 'required|email|unique:users,contact_email',
//            'objective' => 'required|min:3|max:50',           
//            'salary' => 'max:20',
//            
//            'first_name' => 'required|min:3|max:50', 
//            'last_name' => 'required|min:3|max:50', 
//            'search_city' => 'required|min:3|max:50', 
//            'phone' => 'max:50', 
//            
//            'education_occupation' => 'required|min:3|max:100',  
//            'education_university' => 'required|min:3|max:100', 
//            //'education_to_year' => 'date|after:education_from_year',
//           
//            'exp1_title' => 'max:100',
//            'exp1_company' => 'max:100',
//            
//        
//            'description' => 'required|min:50|max:5000',
//            'agree' => 'accepted',
            
        ];
    }

    public function messages() {
        return [
           
        ];
    }

}

