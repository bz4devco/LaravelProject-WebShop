<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'nullable|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
            'description' => 'nullable|min:2|',
            'base_url' => 'nullable|max:120|min:2|regex:/^[ا-یa-zA-Z0-9?.:\\/=-]+$/u',
            'keywords' => 'nullable',
            'logo' => 'nullable|image|mimes:png,jpg,ico,svg',
            'icon' => 'nullable|image|mimes:png,jpg,ico,svg',
            'tel' => 'nullable|min:4|max:14|regex:/^[0-9۰-۹+]+$/u',
            'email' => 'nullable|email|min:5|max:60|regex:/^[a-zA-Z0-9.@]+$/u',
            'address' => 'nullable|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
            'telegram' => 'nullable|max:120|min:2|regex:/^[ا-یa-zA-Z0-9?.:\\/=-]+$/u',
            'instagram' => 'nullable|max:120|min:2|regex:/^[ا-یa-zA-Z0-9?.:\\/=-]+$/u',
            'twitter' => 'nullable|max:120|min:2|regex:/^[ا-یa-zA-Z0-9?.:\\/=-]+$/u',
            'linkedin' => 'nullable|max:120|min:2|regex:/^[ا-یa-zA-Z0-9?.:\\/=-]+$/u',
            'google_plus' => 'nullable|max:120|min:2|regex:/^[ا-یa-zA-Z0-9?.:\\/=-]+$/u',
            'google_plus' => 'nullable',
            'status' => 'numeric|in:0,1',
        ];
    }
}
