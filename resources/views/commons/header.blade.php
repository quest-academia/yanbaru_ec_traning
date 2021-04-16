<header>
    <h1><a href="/">やんばるエキスパート</a></h1>
    <nav class="pc-nav">
        <ul>
            @if (Auth::check())
                <p>{{ Auth::user()->last_name }} {{ Auth::user()->first_name }} さん</p>
                <li><a href="/products">商品検索</a></li>
                <li><a href="/cartlist">カート</a></li>
                <li><a href="/orders">注文履歴</a></li>
                <li><a href="/user_info">ユーザ情報</a></li>
                <li><a href="/logout">ログアウト</a></li>
            @else
                <li><a href="/login">ログイン</a></li>
                <li><a href="/signup">新規登録</a></li>
            @endif
        </ul>
    </nav>
</header>