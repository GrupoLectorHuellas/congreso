<?php

namespace Congreso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpositoresEditRequest extends FormRequest
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
            'id'=>'required',
            'nombres'=>'required|max:255',
            'apellidos'=>'required|max:255',
            'experiencia_laboral'=>'required|max:255',
            'titulo'=>'required',
            'email'=>'required',
           
        ];
    }
}
