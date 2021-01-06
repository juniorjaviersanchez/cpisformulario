<?php

namespace App\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoCreateRequest extends FormRequest
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
            'nombres' => 'required|min:5',
            'apellidos' => 'required|min:5',
            'username' => 'required|min:5|unique:alumno',
            'password'=> 'required',
            'idvaucher'=> 'required|min:8|unique:alumno',
            'imgvaucher'=> 'required|mimes:jpeg,png,bmp',
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'El campo de nombres es obligatorio.',
            'apellidos.required' => 'El campo de apellidos es obligatorio.',
            'username.required' => 'El campo de username es obligatorio.',
            'password.required' => 'El campo de password es obligatorio.',
            'idvaucher.required' => 'El campo de idvaucher es obligatorio.',
            'imgvaucher.required' => 'El campo Foto es obligatorio.',
            'nombres.min' => 'El campo nombres debe contener al menos 5 caracteres.',
            'apellidos.min' => 'El campo apellidos debe contener al menos 5 caracteres.',
            'username.min' => 'El campo username debe contener al menos 5 caracteres.',
            'password.min' => 'El campo password debe contener al menos 8 caracteres.',
            'idvaucher.min' => 'El campo username debe contener al menos 8 caracteres.',   
            'username.unique' => 'El campo username debe ser Único.', 
            'idvaucher.unique' => 'El campo id Vaucher debe ser Único.', 
            'imgvaucher.mimes' => 'El compo Foto debe ser un archivo de tipo: jpeg, png, bmp.',
            
        ];
    }
}
