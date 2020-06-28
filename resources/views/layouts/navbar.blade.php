<nav class="navbar py-3 navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Web Laravel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{url('home')}}">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('about') }}">About</a>
        <a class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a>
        <a class="nav-item nav-link {{ request()->is('blog') ? 'active' : '' }}" href="{{ route('blog.index') }}">Blogs</a>
        <a class="nav-item nav-link {{ request()->is('category') ? 'active' : '' }}" href="{{ route('category.index') }}">Categories</a>
      </div>
    </div>
  </div>
</nav>