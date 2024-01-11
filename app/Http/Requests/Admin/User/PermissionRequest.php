<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
                'title' => 'required|min:2|max:120|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,، ]+$/u',
                'name' => 'required|min:2|max:120|unique:permissions,name|regex:/^[a-zA-Z0-9\-]+$/u',
                'description' => 'required|min:2|max:200|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,، ]+$/u',
            ];
        } else {
            return [
                'title' => 'required|min:2|max:120|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,، ]+$/u',
                'name' => ['required', 'min:2', 'max:120', 'regex:/^[a-zA-Z0-9\-]+$/u', Rule::unique('permissions')->ignore($this->name, 'name')],
                'description' => 'required|min:2|max:200|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,، ]+$/u',
            ];
        }
    }


    public function attributes()
    {
        return [
            'title' => 'عنوان سطح دسترسی',
            'name' => 'نام لاتین',
            'description' => 'توضیح سطح دسترسی',
        ];
    }
}
