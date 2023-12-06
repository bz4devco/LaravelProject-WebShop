<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
                'title' => 'required|max:300|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,، ]+$/u',
                'body' => 'required|max:300|min:5',
                'url' => 'required|max:120|min:2|unique:pages,slug|regex:/^[ا-یa-zA-Z0-9۰-۹ء-ي ]+$/u',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }else{
            return [
                'title' => 'required|max:300|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,، ]+$/u',
                'body' => 'required|max:300|min:5',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
    }
}
