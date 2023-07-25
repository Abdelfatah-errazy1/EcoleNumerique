<?php

namespace App\Http\Requests\Admin\Directeur;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function config;

class EditDirecteruEtbRequest extends FormRequest
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
            config('tables.directeure.columns.avatar')  => $this->image('avatar') . 'image|mimes:jpeg,png,jpg|max:2048',
            config('tables.directeure.columns.last_name')  => 'required|string|max:150',
            config('tables.directeure.columns.first_name')  => 'required|string|max:150',
            config('tables.directeure.columns.gender')  => 'nullable|string|max:2|' . Rule::in(['H', 'F']),
            config('tables.directeure.columns.civility')  => 'nullable|string|max:5|'. Rule::in(['C', 'M','D','V']),
            config('tables.directeure.columns.date_of_birth')  => 'nullable|date',
            config('tables.directeure.columns.title_function')  => 'nullable|string|max:255',
            config('tables.directeure.columns.type')  => 'nullable|string|max:255',
            config('tables.directeure.columns.observation')  => 'nullable|string|max:255',
            config('tables.directeure.columns.phone')  => 'nullable|string|max:15',
            config('tables.directeure.columns.gsm')  => 'nullable|string|max:15',
            config('tables.directeure.columns.fax')  => 'nullable|string|max:15',
            config('tables.directeure.columns.address')  => 'nullable|string|max:255',
            config('tables.directeure.columns.postal_code')  => 'nullable|string|max:100',
            config('tables.directeure.columns.city')  => 'nullable|string|max:100',
            config('tables.directeure.columns.country')  => 'nullable|string|max:50',
            config('tables.directeure.columns.email')  => 'nullable|email|max:50',
            config('tables.directeure.columns.web_site')  => 'nullable|string|max:255',
            config('tables.directeure.columns.nationality') => 'nullable|string|max:50',
        ];
    }
    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
