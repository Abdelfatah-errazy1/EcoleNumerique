<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addChapitre extends FormRequest
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
            'numChap' => 'required|max:20',
            'matiere' => 'required',
            'nomFr' => 'required|max:100',
            'nomAr' => 'required|max:100',
            'dureeH' => 'nullable|integer|max:200',
            'dureeM' => 'nullable|integer|max:59',
            'descriptionFr' => 'required',
            'descriptionAr' => 'nullable',
        ];
    }
}
