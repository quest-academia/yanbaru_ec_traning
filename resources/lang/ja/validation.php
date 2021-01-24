<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'email' => ':attributeが正しくありません。',
    'max' => [
            'string' => ':attributeは:max文字以内で入力してください。',
        ],
    'numeric' => ':attributeは数字で入力してください。',
    'required' => ':attributeは必須項目です。',

    'attributes' => [
            'name'     => 'お名前',
            'email'    => 'メールアドレス',
            'tel'      => '電話番号',
            'gender'   => '性別',
            'contents' => 'お問い合わせ内容',
            'password'=>'パスワード'
        ],
    'alpha_num' => ':attributeは半角英数字で入力してください。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

];
