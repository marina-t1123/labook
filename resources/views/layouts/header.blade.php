@auth
    <!-- ログイン時に表示されるヘッダー -->
    <header class="header-bg">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand text-lg" href="#">Senior1</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    <ul class="navbar-nav">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link" style="text-decoration: none; padding: 0;">Log out</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @include('components.session-message')
@else
    <!-- 未ログイン時に表示されるヘッダー -->
    <header class="" style="height: 50px">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand text-lg" href="#">Senior1</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Sing up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @include('components.session-message')
@endauth
