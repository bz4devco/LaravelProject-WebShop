<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiscountRequest extends FormRequest
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
            'title' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،: ]+$/u',
            'amount' => 'required|regex:/^\d{1,20}(\.\d{1,3})?$/',
            'discount_ceiling' => 'nullable|regex:/^\d{1,20}(\.\d{1,3})?$/',
            'start_date' => 'required|numeric|lt:end_date',
            'end_date' => 'required|numeric|gt:start_date',
            'percentage' => 'required|numeric|min:1|max:100',
            'status' => 'required|numeric|in:0,1',
        ];
    }
}
