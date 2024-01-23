<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'persian_name' => 'required|max:120|min:2|regex:/^[الف-ی۰-۹آء-ي.،() ]+$/u',
                'orginal_name' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،() ]+$/u',
                'logo' => 'required|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
        else{
            return [
                'persian_name' => 'required|max:120|min:2|regex:/^[الف-ی۰-۹آء-ي.، ]+$/u',
                'orginal_name' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,، ]+$/u',
                'logo' => 'nullable|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }

    }
}
