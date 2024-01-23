<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                'name' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،:() ]+$/u',
                'introduction' => 'required|min:2|',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'price' => 'required|regex:/^\d{1,20}(\.\d{1,3})?$/',
                'weight' => 'required|regex:/^\d{1,10}(\.\d{1,2})?$/',
                'length' => 'required|regex:/^\d{1,10}(\.\d{1})?$/',
                'width' => 'required|regex:/^\d{1,10}(\.\d{1})?$/',
                'height' => 'required|regex:/^\d{1,10}(\.\d{1})?$/',
                'related_product.*' => 'nullable|exists:products,id',
                'category_id' => 'required|exists:product_categories,id',
                'brand_id' => 'required|exists:brands,id',
                'published_at' => 'required|numeric',
                'tags' => 'required',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
            ];
        }
        else{
            return [
                'name' => 'required|max:120|min:2|regex:/^[الف-یa-zA-Z0-9\-۰-۹آء-ي.,،:() ]+$/u',
                'introduction' => 'required|min:2|',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,ico,svg,webp',
                'price' => 'required|regex:/^\d{1,20}(\.\d{1,3})?$/',
                'weight' => 'required|regex:/^\d{1,10}(\.\d{1,2})?$/',
                'length' => 'required|regex:/^\d{1,10}(\.\d{1})?$/',
                'width' => 'required|regex:/^\d{1,10}(\.\d{1})?$/',
                'height' => 'required|regex:/^\d{1,10}(\.\d{1})?$/',
                'related_product.*' => 'nullable|exists:products,id',
                'category_id' => 'required|exists:product_categories,id',
                'brand_id' => 'required|exists:brands,id',
                'published_at' => 'required|numeric',
                'tags' => 'required',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
            ];
        }
    }


    public function attributes()
    {
        return[
            'name'                  =>      'نام کالا',
            'category_id'           =>      'دسته کالا',
            'brand_id'              =>      'برند کالا',
            'price'                 =>      'قیمت کالا',
            'description'           =>      'توضیحات کالا',
        ];
    }
}
