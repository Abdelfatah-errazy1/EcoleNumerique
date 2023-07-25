<?php

namespace App\Http\Requests\Admin\Abonnement;

use Illuminate\Foundation\Http\FormRequest;
use function config;

class AbonnementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            config('tables.abonnements.columns.title') => 'required|string|max:150',
            config('tables.abonnements.columns.number_accounts_anseignants') => 'required|numeric|min:0',
            config('tables.abonnements.columns.number_accounts_scolarite') => 'required|numeric|min:0',
            config('tables.abonnements.columns.description') => 'nullable|string|max:255',
            config('tables.abonnements.columns.tarif_vente') => 'required|numeric|min:0',
            config('tables.abonnements.columns.tarif_promo') => 'nullable|numeric|min:0',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
