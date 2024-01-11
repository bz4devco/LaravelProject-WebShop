<?php

namespace App\Http\Requests\Customer\profile;

use App\Rules\NationalCode;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => 'required|min:1|max:120|regex:/^[آ-یء-ئ ]+$/u',
            'last_name' => 'required|min:1|max:120|regex:/^[آ-یء-ئ ]+$/u',
            'email' => ['sometimes','nullable', 'email', 'regex:/^\S+@\S+\.\S+$/u', Rule::unique('users')->ignore($this->user()->email, 'email')],
            'mobile' => ['sometimes','required', 'regex:/(0|\+98)?([ ]|-|[()]){0,2}9[0|1|2|3|4|9]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/'],
            'national_code' => ['required', 'digits:10', 'numeric', new NationalCode(), Rule::unique('users')->ignore($this->user()->national_code, 'national_code')],
        ];
    }
}
