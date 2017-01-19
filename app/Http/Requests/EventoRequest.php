<?php

namespace Congreso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'nombre'=>'required|max:255',
            'descripcion'=>'required|max:255',
            'fecha_inicio'=>'required|before:fecha_fin',
            'fecha_fin'=>'required|after:fecha_inicio',
            'precio_estudiante'=>'required',
            'id_categorias'=>'required',
        ];
    }
}
