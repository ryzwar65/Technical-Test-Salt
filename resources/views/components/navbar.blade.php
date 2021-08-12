<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
      <div class="d-flex justify-content-center align-items-center">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ Auth::user()->name }} | 
        </a>
        <span class="badge badge-danger">{{count(Auth::user()->ordertopups()->get()) + count(Auth::user()->orderproducts()->get())}}</span> <div class="px-2">Unpaid Order</div>
    </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                <a href="{{route('prepaid-balance.index')}}" class="dropdown-item">Topup Balance</a> | <a href="{{route('product.index')}}" class="dropdown-item">Product Balance</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              @endguest
          </ul>
      </div>
  </div>
</nav>