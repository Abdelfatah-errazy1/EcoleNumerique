<?php

namespace App\Http\Requests\Admin\Etablissement;

use Illuminate\Foundation\Http\FormRequest;

class addEtablissementRequest extends FormRequest
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

           config('tables.etablissements.columns.logo') =>$this->image(config('tables.etablissements.columns.logo')) . 'image|mimes:jpeg,png,jpg|max:2048',
           config('tables.etablissements.columns.name_AR') =>'nullable|string|max:150',
           config('tables.etablissements.columns.name_FR') =>'required|string|max:150',
           config('tables.etablissements.columns.address') =>'nullable|string|max:50',
           config('tables.etablissements.columns.city') =>'nullable|string|max:100',
           config('tables.etablissements.columns.postal_code') =>'nullable|string|max:10',
           config('tables.etablissements.columns.country') =>'required|string|max:100',
           config('tables.etablissements.columns.email') =>'nullable|email|max:150',
           config('tables.etablissements.columns.web_site') =>'nullable|string|max:150',
           config('tables.etablissements.columns.phone') =>'nullable|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
           config('tables.etablissements.columns.whatsapp') =>'nullable|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
           config('tables.etablissements.columns.description_FR') =>'nullable|string|max:255',
           config('tables.etablissements.columns.description_AR') =>'nullable|string|max:255',
           config('tables.etablissements.columns.directeur_FK') =>'required|exists:'.config('tables.directeure.name').','.config('tables.directeure.columns.id'),


        ];
    }

    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
