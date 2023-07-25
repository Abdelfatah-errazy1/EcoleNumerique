<?php

namespace App\Http\Requests\Admin\Secteurs;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            config('tables.secteurs.columns.name_fr') => 'required|max:150',
            config('tables.secteurs.columns.name_ar') => 'nullable|string|max:150',
            config('tables.secteurs.columns.description_ar') => 'nullable|string',
            config('tables.secteurs.columns.description_fr') => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
