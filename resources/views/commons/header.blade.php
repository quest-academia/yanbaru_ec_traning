<header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning p-4">
        <a class="navbar-brand" href="/">やんばるエキスパート</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            
            <div class="d-flex flex-column">
                
                <p class="text-right flex-column mr-4">
                    {{--
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                    --}}

                    さん
                </p>

                <ul class="navbar-nav">
                
                    {{-- @if (Auth::check()) --}}

                        <li class="nav-item">
                            <a class="nav-link active" href="/">商品検索</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/">カート</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/">注文履歴</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/">ユーザ情報</a>
                        </li>
                        <li class="nav-item">{!! link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link active']) !!}</li>

                    {{--
                    @else
                        
                        <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link active']) !!}</li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/">新規登録</a>
                        </li>
                        
                    @endif
                    --}}

                </ul>

            </div>

        </div>

    </nav>
</header>
