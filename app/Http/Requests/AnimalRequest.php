<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AnimalRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'name' => 'required|min:2',
            'type' => 'required|min:2',
            'nick' => 'required|min:2',
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PATCH':
                return [
                    'id' => 'required|integer|exists:animal,id',
                    ] + $rules;
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:animal,id'
                ];

        }
    }

    public function messages()
    {
        return [
            'name.required' => 'A name is required',
            'type.required' => 'A type is required',
            'nick.required' => 'A nick is required',
            'picture_path.required' => 'A picture_path is required',
        ];
    }
}
