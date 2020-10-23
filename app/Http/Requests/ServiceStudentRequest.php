<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStudentRequest extends FormRequest
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
            'names'          => ['required','string'],            
            'description'   => ['required', 'string','max:100'],
            'cost'          => ['required', 'integer'],
            'latbox'        => 'required',
            'longbox'       => 'required',            
        ];
    }
    public function messages(){
        return[
            'names.required' => 'Es importante que selecciones tu oficio',
            'description.required' => 'Es importante que escribas una descripcion valida',
            'description.min' => 'Es importante la decripcion posea mas de 10 caracteres',
            'cost.required' => 'Es importante que introduscas un valor',
            'cost.integer' => 'El costo debe ser un valor numerico',
        ];
    }
}
