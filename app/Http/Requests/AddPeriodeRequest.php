<?php

namespace App\Http\Requests;

use App\Models\Periode;
use Illuminate\Foundation\Http\FormRequest;

class AddPeriodeRequest extends FormRequest
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
            'codeP' => 'required|max:10',
            'filliereNiveau' => 'nullable|exists:filliereniveau,id',
            'nomP' => 'required|string|max:50',
            'dateDebut' => 'nullable|date',
            'dateFin' => 'nullable|date',
            'description' => 'nullable|string',
        ];
    }
}
