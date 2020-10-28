<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'          => '',
            'phoneNumber'   => ['required', 'integer'],
            'address'          => ['required', 'string'],
            'file'          => 'image|max:2048',
        ];
    }
    public function messages(){
        return[                        
            'phoneNumber.required' => 'Es importante que introduscas un numero',
            'phoneNumber.integer' => 'Es importante que introduscas un numero detelefono valido',
            'address.required' => 'Es importante que escribas una direccion valida',            
            'address.string' => 'Es importante que escribas una direccion valida',            
            'file.image' => 'Es importante que subas una imagen',            
        ];
    }
}
