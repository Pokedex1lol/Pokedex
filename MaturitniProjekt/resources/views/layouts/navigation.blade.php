<nav class="navbar">
    <div class="logo">
        <a href="{{ route('landing') }}">Půjčovna JDM</a>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('landing') }}" class="nav-link">Domů</a></li>
        <li><a href="{{ route('dashboard') }}" class="nav-link">Auta</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link">Kontakt</a></li>
    </ul>
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
</nav>