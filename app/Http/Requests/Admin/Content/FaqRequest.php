<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
                'qusetion' => 'required|max:300|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,؟!،?! ]+$/u',
                'answer' => 'required|max:300|min:5',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }else{
            return [
                'qusetion' => 'required|max:300|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,؟!،?! ]+$/u',
                'answer' => 'required|max:300|min:5',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }
    }
}
