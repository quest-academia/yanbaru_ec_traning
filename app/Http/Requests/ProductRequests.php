<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequests extends FormRequest
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
        'product_name' => 'required',
        'description' => 'required',
        'price' => 'required|integer',
        'category_id' => 'required',
        'product_status_id' => 'required',
        'sale_status_id' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'product_name.required' => '商品名を入力して下さい。',
            'description.required' => '商品説明を入力して下さい',
            'price.required' => '価格を入力して下さい。',
            'price.integer' => '価格を数字で入力して下さい。',
            'category_id.required' => '商品カテゴリーを選択して下さい。',
            'product_status_id.required' => '商品状態を選択して下さい',
            'sale_status_id.required' => '販売状態を選択して下さい',
        ];
    }
}
