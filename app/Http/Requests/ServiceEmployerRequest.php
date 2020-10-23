<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceEmployerRequest extends FormRequest
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
            'name'          => ['required','string'],
            'distance'      => ['required','numeric'],
            'latbox'        => 'required',
            'longbox'       => 'required',            
        ];
    }
    public function messages(){
        return[
            'name.required' => 'Es importante que selecciones un oficio',            
            'distance.required' => 'Es importante que selecciones una distancia',            
            'distance.numeric' => 'Valor invalido',            
        ];
    }
}
