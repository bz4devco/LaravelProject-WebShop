<?php

namespace App\Http\Requests\Customer\SalesProcess;

use App\Rules\NationalCode;
use Illuminate\Foundation\Http\FormRequest;

class ProfileCompletionRequest extends FormRequest
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
            'first_name' => 'sometimes|required|min:1|max:120|regex:/^[آ-یء-ئ ]+$/u',
            'last_name' => 'sometimes|required|min:1|max:120|regex:/^[آ-یء-ئ ]+$/u',
            'email' => 'sometimes|nullable|email|unique:users,email|regex:/^\S+@\S+\.\S+$/u',
            'mobile' => ['sometimes', 'required', 'regex:/(0|\+98)?([ ]|-|[()]){0,2}9[0|1|2|3|4|9]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/'],
            'national_code' => ['sometimes', 'required', 'unique:users,national_code', 'digits:10', 'numeric', new NationalCode()],
        ];
    }
}
