<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBlocRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            "codeB" => 'required|max:20',
            "titre" => 'required|max:150',
            "description" => 'nullable',
            "batiment" => 'integer|exists:batiments,id'
            // ! required in batiment make the update imposibal 🚨
        ];
    }
}
