<?php

namespace App\Http\Requests\Customer\Profile;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'subject' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,، ]+$/u',
            'description' => 'required|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,، ]+$/u',
            'file_attachment' => 'nullable|file|max:51200|mimes:png,jpg,jpeg,webp,zip,rar,doc,docx,txt,pdf',
            'category_id' => 'required|exists:ticket_categories,id',
            'priority_id' => 'required|exists:ticket_priorities,id',
        ];
    }


    public function attributes()
    {
        return [
            'subject' => 'عنوان تیکت',
            'description' => 'متن تیکت'
        ];
    }
}
