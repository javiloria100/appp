<?php

namespace trapsnoteWeb\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Nuevas validaciones
use trapsnoteWeb\Rules\ValidarMayoria;


class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => [new ValidarIgualdad],
            'password'=>[] [new ValidarIgualdad],
        ];
    }
}
