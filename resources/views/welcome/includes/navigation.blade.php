<!-- Navigation -->
<a class="menu-toggle rounded" href="#">
  <i class="fa fa-bars"></i>
</a>

<nav id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a class="js-scroll-trigger" href="#page-top">Srednja škola</a>
    </li>
    <li class="sidebar-nav-item">
      <a class="js-scroll-trigger" href="{{ url('/') }}">Naslovnica</a>
    </li>
    <li class="sidebar-nav-item">
      <a class="js-scroll-trigger" href="{{ url('/upisi/kreiranjeranglisti') }}">Rang liste</a>
    </li>
    <li class="sidebar-nav-item">
      @if(Auth::check())
        <a class="js-scroll-trigger" href="{{ route('logout') }}">Odjavi se</a>
      @else
        <a class="js-scroll-trigger" href="{{ route('login') }}">Prijavi se</a>
      @endif
    </li>
  </ul>
</nav>
