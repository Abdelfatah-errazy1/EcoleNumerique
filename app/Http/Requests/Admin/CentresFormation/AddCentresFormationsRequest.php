<?php

namespace App\Http\Requests\Admin\CentresFormation;

use Illuminate\Foundation\Http\FormRequest;

class AddCentresFormationsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        // dd('$request');
        // dd(request());

        return [
            config('tables.centreformations.columns.logo') =>$this->image(config('tables.centreformations.columns.logo')) . 'image|mimes:jpeg,png,jpg|max:2048',
            config('tables.centreformations.columns.etablissement_FK') =>'required|exists:'.config('tables.etablissements.name').','.config('tables.etablissements.columns.id'),
            config('tables.centreformations.columns.name_FR') =>'required|string|max:150',
            config('tables.centreformations.columns.name_AR') =>'nullable|string|max:150',
            config('tables.centreformations.columns.address') =>'nullable|string|max:50',
            config('tables.centreformations.columns.postal_code') =>'nullable|string|max:10',
            config('tables.centreformations.columns.country') =>'required|string|max:100',
            config('tables.centreformations.columns.city') =>'nullable|string|max:100',
            config('tables.centreformations.columns.email') =>'nullable|email|max:150',
            config('tables.centreformations.columns.web_site') =>'nullable|string|max:150',
            config('tables.centreformations.columns.phone') =>'nullable|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            config('tables.centreformations.columns.whatsapp') =>'nullable|string|max:15|regex:/^([0-9\s\-\+\(\)]*)$/',
            config('tables.centreformations.columns.description_FR') =>'nullable|string|max:255',
            config('tables.centreformations.columns.description_AR') =>'nullable|string|max:255',

















        ];
    }

    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
