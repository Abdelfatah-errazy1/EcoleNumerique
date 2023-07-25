<?php

namespace App\Http\Requests;

use App\Models\Module;
use App\Models\Periode;
use Illuminate\Foundation\Http\FormRequest;

class AddMatiereRequest extends FormRequest
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
        // dd(request());
        return [
            'codeMa' => 'required|string|max:20',
            'nomFr' => 'required|string|max:100',
            'nomAr' => 'required|string|max:100',
            'heure' => 'nullable|integer',
            'minute' => 'nullable|integer|max:59',
            'coef' => 'required|integer',
            'descriptionFr' => 'required|string',
            'descriptionAr' => 'required|string',
            'module' => 'required',
            'periode' => 'required|exists:periodes,' . Periode::PK,
            
        ];
    }
}
