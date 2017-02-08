<?php

namespace Congreso\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenCertificadoRequest extends FormRequest
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
            'path'=>'required|file|mimes:jpeg,bmp,png|max:10240',
        ];
    }
}
