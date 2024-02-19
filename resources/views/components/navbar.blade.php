<header>
    <a href="{{ route('welcome') }}"><img class="logo" src="/media/logo.png" alt=""></a>
    <div class="group">
        <ul class="navigation">
            <li><a class="ciao" href="{{ route('createAnnouncement') }}">{{ __('ui.caricaAnnuncio') }}</a></li>
            <li><a class="ciao" href="{{ route('index') }}">{{ __('ui.tuttiGliAnnunci') }}</a></li>
            @auth
                @if (Auth::user()->is_revisor)
                    <li>
                        <a class="ciao" aria-current="page" href="{{ route('revisorIndex') }}">{{ __('ui.revisore') }}
                            <span class="palla translate-middle badge rounded-pill bg-danger">
                                {{ App\Models\Announcement::toBeRevisionedCount() }}

                                <span class=" visually-hidden">Unread Message</span>

                            </span>
                        </a>
                    </li>
                @endif
            @endauth
            <li class="nav-item dropdown">
                <a class="ciao" class="dropdown-toggle liNav hover-item" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('ui.categorie') }}
                </a>
                <ul class="dropdown-menu ">
                    <div class="d-flex flex-column">
                        @foreach ($categories as $key => $category)
                            <a class="text-black my-Custom " href="{{ route('categoryShow', compact('category')) }}">{{ __("ui.$category->name") }}
                               
                                </a>
                                @if ($key < count($categories) - 1)
                                    <hr>
                                @endif
                            
                        @endforeach
                    </div>
                </ul>
            </li>
            <div class="dropdown header__quick d-flex align-items-center ">

                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @guest
                        {{ __('ui.accediRegistrati') }}
                    @endguest

                    @Auth
                        Ciao {{ Auth::user()->name }}
                    @endauth
                </button>
                <ul class="dropdown-menu bg-Custom ">
                    @guest
                        <li class="hover-item"><a class="dropdown-item navAuth" href="{{ route('login') }}">Login</a></li>
                        <li class="hover-item"><a class="dropdown-item navAuth" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item navAuth">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>



            </div>
        </ul>
        <div class="search">
            {{-- lente d'ingrandimento --}}
            <span class="icon">
                <i class="fa-solid fa-magnifying-glass text-white mx-3 searchBtn"></i>
            </span>

        </div>
        {{-- Menù responsive --}}
        <svg class="menuToggle" xmlns="http://www.w3.org/2000/svg" height="28" width="26" viewBox="0 0 448 512">
            <path fill="#ffffff"
                d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
        </svg>
    </div>
    <div class="searchBox">
        <form class="d-flex formInput" role="search" method="GET" action="{{ route('searchAnnouncement') }}">
            @csrf
            <input class="bello" name="searched" type="text" placeholder="Cerca qui...">
            <button class="btn"><i class="fa-solid fa-magnifying-glass text-white fontSizeI"></i></button>
        </form>

        {{-- X --}}
        <button class="btn">
            <i class="fa-solid fa-xmark text-white closeBtn fontSizeI"></i>
        </button>
    </div>
</header>
