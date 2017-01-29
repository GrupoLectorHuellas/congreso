<?php

namespace Congreso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContenidoRequest extends FormRequest
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
            'subtemas'=>'required|max:200',
            'hora_inicio'=>'required|before:hora_fin',
            'hora_fin'=>'required|after:hora_inicio',
            'id_contenido'=>'required',
        ];
    }
}
