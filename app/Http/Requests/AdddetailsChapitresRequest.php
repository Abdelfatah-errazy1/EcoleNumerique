<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdddetailsChapitresRequest extends FormRequest
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
            'code' => 'required|max:20',
            'chapitre' => 'required|exists:chapitres,idCh',
            'titreFr' => 'required|max:100',
            'titreAr' => 'nullable|max:100',
            'descriptionFr' => 'required',
            'descriptionAr' => 'required',
        ];
    }
}
