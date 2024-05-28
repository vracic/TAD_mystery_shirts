<nav class="navbar navbar-expand-lg bg-light py-4 fixed-top custom-navbar" id="navbar-scrollspy">
      <div class="container">
        <div class="logo">
            <a aria-label="MisteryBox Element" data-cy="Mosterybox-logo" title="Back home" href="#"><img alt="Misterybox logo logo" loading="lazy" height="80" decoding="async" data-nimg="1" style="color:transparent" src="img/logo.png"></a>
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
            <a class="nav-link {{ request()->routeIs('packages.index') || request()->routeIs('other.home.routes') ? 'active' : '' }}" href="{{ route('packages.index') }}">@lang('messages.nav_home')</a>
            <a class="nav-link" href="#boxes">@lang('messages.nav_boxes')</a>
            <a class="nav-link" href="#HowItWorks">@lang('messages.nav_hiw')</a>
            <a class="nav-link" href="#aboutUs">@lang('messages.about')</a>
            <a class="nav-link" href="#getConnected">@lang('messages.nav_contact')</a>
            <a class="nav-link" href="#" onclick="toggleLang()" onclick="toggleLang()">@lang('messages.lang') </a>
            <a class="nav-link {{ request()->routeIs('cart.index') ? 'active' : '' }}" href="{{ route('cart.index') }}">@lang('messages.cart')</a>

          </div>
        </div>
      </div>
</nav>