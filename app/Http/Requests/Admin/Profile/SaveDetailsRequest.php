<?php

namespace App\Http\Requests\Admin\Profile;

use App\Enums\AdminGender;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class SaveDetailsRequest extends FormRequest
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

            config('tables.admins.columns.photo') => 'nullable|image|mimes:jpeg,png,jpg|max:'.config('configs.image_upload_max_size'),
            config('tables.admins.columns.first_name') => 'required|string|max:150',
            config('tables.admins.columns.last_name') => 'required|string|max:150',
            config('tables.admins.columns.birthday') => 'nullable|date',
            config('tables.admins.columns.gender') => ['required',new Enum(AdminGender::class)],
            config('tables.admins.columns.phone_number') => 'nullable|string|max:15',
            config('tables.admins.columns.email') => 'required|string|max:255',
            config('tables.admins.columns.description') => 'required|string|max:255',



        ];
    }

    private function image($name): string
    {
        return $this->request->get("$name-preview") !== null ? 'nullable|' : 'required|';
    }
}
