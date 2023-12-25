<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
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
                'name' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
                'description' => 'required|min:2|',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'status' => 'required|numeric|in:0,1',
                'show_in_menu' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'parent_id' => 'nullable|exists:product_categories,id',
            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
                'description' => 'nullable|min:2|',
                'image' => 'image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'status' => 'required|numeric|in:0,1',
                'show_in_menu' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'parent_id' => 'nullable|exists:product_categories,id',
            ];
        }
    }
}
