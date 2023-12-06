<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'summery' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'body' => 'required|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',                'commentable' => 'required|numeric|in:0,1',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,ico,svg',
                'category_id' => 'required|numeric|exists:post_categories,id|regex:/^[0-9]+$/u',
                'published_at' => 'required|numeric',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'sort' => 'required|numeric',
            ];
        }else{
            return [
                'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'summery' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',
                'body' => 'required|min:5|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,><\/;\n\r& ]+$/u',                'commentable' => 'required|numeric|in:0,1',
                'image' => 'image|mimes:png,jpg,jpeg,gif,ico,svg',
                'category_id' => 'required|numeric|exists:post_categories,id|regex:/^[0-9]+$/u',
                'published_at' => 'required|numeric',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
                'sort' => 'required|numeric',
            ];
        }
    }
}
