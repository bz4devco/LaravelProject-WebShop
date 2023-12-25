<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
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
                'code' => 'required|max:7|min:7|unique:copans,code|regex:/^[a-zA-Z0-9]+$/u',
                'amount' => [(request()->amount_type == 0) ? 'max:100' : '', 'regex:/^\d{1,20}(\.\d{1,3})?$/'],
                'amount_type' => 'required|numeric|in:0,1',
                'discount_ceiling' => 'nullable|regex:/^\d{1,20}(\.\d{1,3})?$/',
                'start_date' => 'required|numeric|lt:end_date',
                'end_date' => 'required|numeric|gt:start_date',
                'user_id' => 'nullable|exists:users,id',
                'type' => 'required|numeric|in:0,1',
                'status' => 'required|numeric|in:0,1',
            ];
        }
        else{
            return [
                'amount' => [(request()->amount_type == 0) ? 'max:100' : '', 'required', 'regex:/^\d{1,20}(\.\d{1,3})?$/'],
                'amount_type' => 'required|numeric|in:0,1',
                'discount_ceiling' => 'nullable|regex:/^\d{1,20}(\.\d{1,3})?$/',
                'start_date' => 'required|numeric|lt:end_date',
                'end_date' => 'required|numeric|gt:start_date',
                'user_id' => 'nullable|exists:users,id',
                'type' => 'required|numeric|in:0,1',
                'status' => 'required|numeric|in:0,1',
            ];
        }
        
    }

    public function attributes()
    {
        return[
            'amount'                  =>      'مقدار تخفیف',
        ];
    }
}
