<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        
        return [

            // バリデーションルールについて記述
            'last_name' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:10'],
            'zipcode' => ['required', 'numeric', 'digits:7'],
            'prefecture' => ['required', 'string', 'max:5'],
            'municipality' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:15'],
            'apartments' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('m_users')->ignore($user->id)],
            'phone_number' => ['required', 'numeric', 'digits_between:4,15'],
        ];
    }

    // バリデーション日本語表示
    public function messages()
    {
        return[
            'last_name.required' => '姓を入力してください。',
            'last_name.string' => '文字列とし入力してください。',
            'last_name.max' => '姓は10文字以内でお願いします。',
            'first_name.required' => '名前を入力してください。',
            'first_name.string' => '文字列とし入力してください。',
            'first_name.max' => '名前は10文字以内でお願いします。',
            'zipcode.required' => '郵便番号を入力してください。',
            'zipcode.numeric' => '郵便番号は半角数字を入力してください。',
            'zipcode.digits' => '郵便番号は7文字入力してください。',
            'prefecture.required' => '都道府県を入力してください。',
            'prefecture.string' => '文字列とし入力してください。',
            'prefecture.max' => '都道府県は5文字以内でお願いします。',
            'municipality.required' => '市町村区を入力してください。',
            'municipality.string' => '市町村区を入力してください。',
            'municipality.max' => '市町村区は10文字以内でお願いします。',
            'address.required' => '番地を入力してください。',
            'address.string' => '文字列とし入力してください。',
            'address.max' => '番地は15文字以内でお願いします。',
            'apartments.required' => 'マンション名/部屋番号を入力してください。',
            'apartments.string' => '文字列とし入力してください。',
            'apartments.max' => 'マンション名/部屋番号は20文字以内でお願いします。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.string' => '文字列とし入力してください。',
            'email.email' => 'メールアドレスの形式で入力してください。',
            'email.max' => 'メールアドレスは50文字以内でお願いします。',
            'email.unique' => '現在このメールアドレスは他のユーザによって使用されています。',
            'phone_number.required' => '電話番号を入力してください。',
            'phone_number.numeric' => '電話番号は半角数字を入力してください。',
            'phone_number.digits_between' => '電話番号は4文字以上15文字以内で入力してください。'
        ];
    }
}