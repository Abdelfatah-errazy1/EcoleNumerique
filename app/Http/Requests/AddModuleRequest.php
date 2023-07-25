<?php

namespace App\Http\Requests;

use App\Models\Filiere;
use App\Models\FilliereNiveau;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddModuleRequest extends FormRequest
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
            'codeMod' => 'required|string|max:20',
            'nomFr' => 'required|string|max:100',
            'nomAr' => 'required|string|max:100',
            'heure' => 'nullable|integer',
            'minute' => 'nullable|integer|max:59',
            'coef' => 'required|integer',
            'descriptionFr' => 'required|string',
            'descriptionAr' => 'required|string',
            'filliereNiveau' => 'required|exists:filliereNiveau,' . Filiere::PK,
            
        ];
    }
}
