<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_home.index') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.logout') }}">{{ __('Logout') }}</a>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">{{ __('Register') }}</a>
                </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('Language')  }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('app.set_locale', ['locale' => 'en']) }}">en</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('app.set_locale', ['locale' => 'fi']) }}">fi</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>