<link rel="stylesheet" href="{{ asset('css/cms_header_footer.css') }}">
<nav class="nav">
  <ul>
    <li>
      <div>
        <a class="nav-link" href="{{ asset('/') }}">HomePage</a>
      </div>
    </li>
    <li class="username">
    <img src="{{URL::asset('/storage/image/falls.jfif')}}" alt="Avatar" class="avatar">
      <div class="username">
        <a class="nav-link" href="{{ asset('profile/profile') }}">
          <span class="username"><?php 
          echo session('user_login');
          ?>
          </span>
        </a>
      </div>
  </li>
  <li>
    <div>
       @if(session()->has('user_login'))
        <a href="{{ asset('/industry/logout') }}">Lougout</a>
       @endif
    </div>
  </li>
</ul>
</nav>