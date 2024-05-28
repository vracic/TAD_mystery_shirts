<nav class="navbar navbar-expand-lg bg-light py-4 fixed-top custom-navbar" id="navbar-scrollspy">
      <div class="container">
        <div class="logo">
            <a aria-label="MisteryBox Element" data-cy="Mosterybox-logo" title="Back home" href="#"><img alt="Misterybox logo logo" loading="lazy" height="80" decoding="async" data-nimg="1" style="color:transparent" src="/img/logo.png"></a>
        </div>
        <div class="navbar-title">
            <ul>
                <div id="ulNAbvar">Kick</div>
                <div id="ulNAbvar">Mistery</div>
                <div id="ulNAbvar">Box</div>
            </ul>
        </div>
       
        </a>
        <!--  botón de hamburguesa para móviles -->
        <button
          class="navbar-toggler bg-dark ml-auto" 
          
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">

            @if(auth()->check())
              @if(auth()->user()->isAdmin())
              <a class="nav-link" href="{{ route('admin.index') }}" >Admin page</a>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
              @else
                  <a class="nav-link {{ request()->routeIs('packages.index') || request()->routeIs('other.home.routes') ? 'active' : '' }}" href="{{ route('packages.index') }}">@lang('messages.nav_home')</a>
                  <a class="nav-link {{ request()->routeIs('cart.index') ? 'active' : '' }}" href="{{ route('cart.index') }}">@lang('messages.cart')</a>
                  <a class="nav-link" href="#" onclick="toggleLang()">@lang('messages.lang') </a>
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                          <a class="dropdown-item" href="{{ route('users.show') }}">{{ __('My Profile') }}</a>
                      </li>                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                      </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                  @endif
                  @endif
          </div>
        </div>
      </div>
</nav>