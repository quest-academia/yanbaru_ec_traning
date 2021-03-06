<header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning p-4">
        <a class="navbar-brand" href="/">やんばるエキスパート</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">

                @if (Auth::check())

                    <li class="nav-item">{!! link_to_route('search', '商品検索', [], ['class' => 'nav-link active']) !!}</li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('') }}">カート</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('order_history') }}" role="button">注文履歴</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('information.show', Auth::user()->id) }}">ユーザ情報</a>
                    </li>
                    <li class="nav-item">{!! link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link active']) !!}</li>

                @else

                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link active']) !!}</li>
                    <li class="nav-item">{!! link_to_route('signup', '新規登録', [], ['class' => 'nav-link active']) !!}</li>

                @endif

            </ul>
        </div>

    </nav>
</header>
