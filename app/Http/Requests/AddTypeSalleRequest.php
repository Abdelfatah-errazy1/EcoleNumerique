<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTypeSalleRequest extends FormRequest
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
            'codeTS' => 'required|string|max:20',
            'titre' => 'required|string|max:150',
            'description' => 'nullable|string|max:150',
            'centreFormation' => 'required|string|max:150',



        ];
    }
}
