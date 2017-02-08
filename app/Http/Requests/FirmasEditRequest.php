<?php

namespace Congreso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirmasEditRequest extends FormRequest
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
            'abreviatura'=>'required|max:20',
            'nombre'=>'required|max:500',
             'apellidos'=>'required|max:500',
             'eventos'=>'required',
            
        ];
    }
}
