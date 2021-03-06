<?php

namespace Congreso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemarioRequest extends FormRequest
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
            'id_temario'=>'required',
            'nombre'=>'required|max:255',
            'duracion'=>'required',
            
        ];
    }
}
