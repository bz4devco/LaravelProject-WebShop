<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'title' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'url' => 'required|max:120|min:2|url',
                'position' => 'required|integer',
                'status' => 'required|numeric|in:0,1',
                'sort' => 'required|numeric',
            ];
        } else {
            return [
                'title' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'url' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9آء-ي?.:\\/=-]+$/u',
                'position' => 'required|integer',
                'status' => 'required|numeric|in:0,1',
                'sort' => 'required|numeric',
            ];
        }
    }

    public function attributes()
    {
        return [
            'title' => 'عنوان بنر', 
        ];
    }
}
