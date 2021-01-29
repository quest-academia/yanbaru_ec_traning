<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        // デフォルトのfalseからtrueに変更
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

            // バリデーションルールについて記述
            'last_name' => 'required|string|max:10',
            'first_name' => 'required|string|max:10',
            'zipcode' => 'required|numeric|digits:7',
            'prefecture' => 'required|string|max:5',
            'municipality' => 'required|string|max:10',
            'address' => 'required|string|max:15',
            'apartments' => 'required|string|max:20',
            'email' => 'required|string|email|max:50|unique:users',
            'phone_number' => 'required|numeric|digits_between:4,15',
        ];
    }
}
