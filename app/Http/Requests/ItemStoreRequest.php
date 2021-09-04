<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO:: return true if user is admin
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
            'name' => 'required',
            'code' => 'required',
            'description' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'وارد کردن نام کالا الزامی میباشد',
            'code.required' => 'وارد کردن کد کالا الزامی میباشد',
            'code.unique' => 'کد کالای وارد شده تکراری میباشد',
            'description.max' => 'کاراکتر مجاز 255 میباشد',

        ];
    }
}
