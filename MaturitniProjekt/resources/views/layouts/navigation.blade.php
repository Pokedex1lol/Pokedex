<nav class="navbar">
    <div class="logo">
        <a href="{{ route('landing') }}">
            <img src="/images/JeDeMe-logo.png" alt="JeDeMe Logo">
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('landing') }}" class="nav-link">Domů</a></li>
        <li><a href="{{ route('dashboard') }}" class="nav-link">Auta</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link">Kontakt</a></li>
    </ul>
    @auth
        <div class="relative">
            <button class="account-button">{{ Auth::user()->name }}</button>
            <div class="dropdown-menu">
                <a href="{{ route('profile.index') }}" class="dropdown-link">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-link logout-button">Odhlásit se</button>
                </form>
            </div>
        </div>
    @else
        <div class="relative">
            <a href="{{ route('login') }}" class="account-button">Přihlásit se</a>
        </div>
    @endauth
</nav>