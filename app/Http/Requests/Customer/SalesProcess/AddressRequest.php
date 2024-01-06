<?php

namespace App\Http\Requests\Customer\SalesProcess;

use App\Rules\PostalCode;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'province_id' => 'required|numeric|exists:provinces,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'address' => 'required|min:2|max:500|regex:/^[آ-یء-ئ\_-، ]+$/u',
            'recipient_first_name' => 'sometimes|required|min:1|max:120|regex:/^[آ-یء-ئ ]+$/u',
            'recipient_last_name' => 'sometimes|required|min:1|max:120|regex:/^[آ-یء-ئ ]+$/u',
            'mobile' => ['sometimes','required', 'regex:/(0|\+98)?([ ]|-|[()]){0,2}9[0|1|2|3|4|9]([ ]|-|[()]){0,2}(?:[0-9]([ ]|-|[()]){0,2}){8}/'],
            'postal_code' => ['required', 'digits:10', 'numeric', new PostalCode()],
            'no' => 'required|numeric|min:1|max:100000',
            'unit' => 'required|numeric|min:1|max:100000',
        ];
    }
}
