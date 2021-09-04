<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntryStoreRequest extends FormRequest
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
            'entry' => 'required|boolean',
            'quantity' => 'required|numeric|min:1',
            'discription' => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'entry.required' => 'وارد کردن ورودی یا خروجی کالا الزامی میباشد',
            'entry.boolean' => 'ورودی/خروجی باید صفر یا یک باشد',
            'quantity.required' => 'وارد کردن تعداد کالا الزامی میباشد',
            'quantity.numeric' => 'تعداد باید مقدار عددی باشد',
            'quantity.min' => 'تعداد باید بیشتر از 1 باشد',
            //'discription.required' => 'وارد کردن توضیحات کالا الزامی میباشد',
            'discription.max' => 'کاراکتر مجاز 255 میباشد',

        ];
    }

}
