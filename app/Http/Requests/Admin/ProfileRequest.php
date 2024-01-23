<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|min:1|max:120|regex:/^[آ-یa-zA-Zء-ئ ]+$/u',
            'last_name' => 'required|min:1|max:120|regex:/^[آ-یa-zA-Zء-ئ ]+$/u',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
        ];
    }
}
