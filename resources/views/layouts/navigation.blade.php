<nav x-data="{ open: false }" class="climbly-nav">
    <div class="climbly-container">
        <div class="climbly-navbar">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="climbly-logo">
                🧗 Climbly
            </a>

            <!-- Navigation ordinateur -->
            <div class="climbly-links">
                <a href="{{ url('/') }}">Accueil</a>
                <a href="{{ url('/produits') }}">Catalogue</a>

                @auth
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                @endauth
            </div>

            <!-- Authentification ordinateur -->
            <div class="climbly-auth">
                @guest
                    <a href="{{ route('login') }}"
                       class="climbly-login">
                        Connexion
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="climbly-register">
                            Inscription
                        </a>
                    @endif
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="climbly-account">
                                {{ Auth::user()->name }}
                                <span>⌄</span>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link
                                :href="route('profile.edit')">
                                Profil
                            </x-dropdown-link>

                            <form method="POST"
                                  action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Déconnexion
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>

            <!-- Bouton hamburger -->
            <button
                class="climbly-hamburger"
                @click="open = !open"
                type="button"
                aria-label="Ouvrir le menu"
                :aria-expanded="open.toString()">
                <svg width="26" height="26"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">
                    <path x-show="!open"
                          d="M4 6h16M4 12h16M4 18h16"/>
                    <path x-show="open"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Menu mobile -->
    <div x-show="open" x-cloak class="climbly-mobile">
        <a href="{{ url('/') }}">Accueil</a>
        <a href="{{ url('/produits') }}">Catalogue</a>

        @auth
            <a href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <div class="climbly-mobile-user">
                <strong>{{ Auth::user()->name }}</strong>
                <small>{{ Auth::user()->email }}</small>
            </div>

            <a href="{{ route('profile.edit') }}">
                Profil
            </a>

            <form method="POST"
                  action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    Déconnexion
                </button>
            </form>
        @else
            <a href="{{ route('login') }}">
                Connexion
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">
                    Inscription
                </a>
            @endif
        @endauth
    </div>
</nav>
