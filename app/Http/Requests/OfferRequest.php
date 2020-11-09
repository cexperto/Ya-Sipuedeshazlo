<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'description'   => ['required','string'],
            'cost'          => ['required', 'integer'],
            'disponibility' => ['required'],            
            'latbox'        => 'required',
            'longbox'       => 'required', 
        ];
    }
    public function messages(){
        return[
            'names.required'        => 'Es importante que indique el nombre de la oferta',            
            'names.string'          => 'El nombre no deber contener numeros',            
            'description.required'  => 'Es importante que escriba una descripcion valida',            
            'cost.required'         => 'Es importante que introdusca un precio',
            'cost.integer'          => 'El costo debe ser un valor numerico',
            'disponibility.required'=> 'Indique la disponibilidad',
            'latbox.required'       => 'Debes esperar que el mapa se muestre correctamente',
            'longbox.required'      => 'Debes esperar que el mapa se muestre correctamente',
        ];
    }

}
