<nav class="navbar navbar-expand-md p-3 navbar-light bg-white shadow-sm">
  <div class="container">
      <a class="navbar-brand mr-3" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form action="{{ route('search.post') }}" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
            {{-- <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
              <a href="/about" class="nav-link">{{ __('About Us') }}</a>
            </li>
            <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
              <a href="/contact" class="nav-link">{{ __('Contact Us') }}</a>
            </li> --}}

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav px-4 ml-auto">
            <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}">
                <a href="{{ route('blog.index') }}" class="nav-link">{{ __('Blogs') }}</a>
            </li>
            <li class="nav-item {{ request()->is('category') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link">{{ __('Categories') }}</a>
            </li>
            <li class="nav-item {{ request()->is('tags') ? 'active' : '' }}">
                <a href="{{ route('tag.index') }}" class="nav-link">{{ __('Tags') }}</a>
            </li>
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
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a href="{{ route('blog.create') }}" class="dropdown-item">{{ __('New Post') }}</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>