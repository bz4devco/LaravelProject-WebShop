<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class AmazingSaleRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|numeric|lt:end_date',
            'end_date' => 'required|numeric|gt:start_date',
            'percentage' => 'required|numeric|min:1|max:100',
            'status' => 'required|numeric|in:0,1',
        ];
    }

    public function attributes()
    {
        return[
            'product_id'                  =>      'نام کالا',
        ];
    }
}
