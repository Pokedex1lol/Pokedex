<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <a href="{{ route('landing') }}">
                <img src="/images/JeDeMe-logo.png" alt="JeDeMe Logo">
            </a>
        </div>

        <!-- Desktop menu -->
        <ul class="nav-links">
            <li><a href="{{ route('landing') }}" class="nav-link">Domů</a></li>
            <li><a href="{{ route('dashboard') }}" class="nav-link">Auta</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link">Kontakt</a></li>
        </ul>

        <!-- Desktop profile -->
        <div class="desktop-profile">
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
        </div>

        <!-- Hamburger menu button -->
        <button class="hamburger-menu" id="hamburger-menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <!-- Mobile menu -->
    <div class="mobile-menu" id="mobile-menu">
        <a href="{{ route('landing') }}" class="nav-link">Domů</a>
        <a href="{{ route('dashboard') }}" class="nav-link">Auta</a>
        <a href="{{ route('contact') }}" class="nav-link">Kontakt</a>
        @auth
            <a href="{{ route('profile.index') }}" class="nav-link">Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link logout-button">Odhlásit se</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="nav-link">Přihlásit se</a>
        @endauth
    </div>
</nav>

<script>
    const hamburgerMenu = document.getElementById('hamburger-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    hamburgerMenu.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
    });

    // Zavřít menu při kliknutí na odkaz
    document.querySelectorAll('.mobile-menu .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
        });
    });
</script>