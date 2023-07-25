<?php

namespace App\Http\Requests;

use App\Models\CategorieNotification;
use Illuminate\Foundation\Http\FormRequest;

class AddNotificationRequest extends FormRequest
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
            'objet' => 'required|string|max:150',
            'dateCreation' => 'required|date',
            'description' => 'nullable|string',
            'CategorieNotif' => 'required|exists:categoriesNotifications,' . CategorieNotification::PK,
            
        ];
    }
}
