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
    'alpha_num' => ':attributeは半角英数字で入力してください。',
    'confirmed' => ':attributeを再入力してください。もしくは確認用パスワードが一致しません。',
    'min' => [
        'numeric' => ':attributeは:min.文字以上で入力してください',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attributeは:min文字以上で入力してください.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'required' => ':attributeは必須項目です',

    'alpha_num_check' => ':attribute は半角英数字で入力してください',

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

    'attributes' => [
        'last_name' => '※姓',
        'first_name' => '※名',
        'zipcode' => '※郵便番号',
        'prefecture' => '※都道府県',
        'municipality' => '※市町村区',
        'address' => '※番地',
        'apartments' => '※マンション・部屋番号',
        'email' => '※メールアドレス',
        'phone_number' => '※電話番号',
        'productName' => '※商品名',
        'categoryId' => '※商品カテゴリ',
        'price' => '※販売単価',
        'saleStatusId' => '※販売状態',
        'productStatusId' => '※商品状態',
        'description' => '※商品説明',
        'password'=>'パスワード'
    ],
];
