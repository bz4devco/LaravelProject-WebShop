<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $route = Route::current();
        if ($route->getName() === 'admin.user.role.store') {
            return [
                'title' => 'required|min:2|max:120|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,،() ]+$/u',
                'name' => 'required|min:2|max:120|unique:roles,name|regex:/^[a-zA-Z0-9\-]+$/u',
                'description' => 'required|min:2|max:200|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,،() ]+$/u',
                'permissions.*' => 'exists:permissions,id',
            ];
        } elseif ($route->getName() === 'admin.user.role.update') {
            return [
                'title' => 'required|min:2|max:120|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,،() ]+$/u',
                'name' => ['required', 'min:2', 'max:120', 'regex:/^[a-zA-Z0-9\-]+$/u', Rule::unique('roles')->ignore($this->name, 'name')],
                'description' => 'required|min:2|max:200|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,،() ]+$/u',
            ];
        } elseif ($route->getName() === 'admin.user.role.permission-update') {
            return [
                'permissions.*' => 'exists:permissions,id',
            ];
        }
    }

    public function attributes()
    {
        return [
            'title' => 'عنوان نقش',
            'name' => 'نام لاتین',
            'description' => 'توضیح نقش',
            'permissions.*' => 'دسترسی',
        ];
    }
}
