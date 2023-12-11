<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            'subject' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
            'body' => 'required|max:300|min:5',
            'published_at' => 'required|numeric',
            'status' => 'required|numeric|in:0,1',
        ];
    }
}
