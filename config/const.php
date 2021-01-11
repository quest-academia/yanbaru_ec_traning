<?php
return [
    // ログイン者のロールによる共通部分のテーマ切り替え用
    'SELLER_MODE' => 'dark',
    'BUYER_MODE'  => 'light',
    // ユーザーのロール定義
    'USER_CLASSIFICATIONS' => [
        'SELLER' => 1, // 出品者
        'BUYER'  => 2, // 購入者
        'ADMIN'  => 3, // 管理者
    ]
];
