<link rel="stylesheet" href="{{ asset('css/cms_header_footer.css') }}">
<nav class="nav">
  <ul>
  <li>
    <div>
      <a class="nav-link" href="{{ asset('cms/cms') }}">cms</a>
    </div>
  </li>
  <li>
    <div>
      <a class="nav-link" href="{{ asset('/') }}">HomePage</a>
    </div>
  </li>
  <li>
    
  </li>
  <li class="username">
  <img src="{{URL::asset('/storage/image/falls.jfif')}}" alt="Avatar" class="avatar">
    <div class="username">
      <a class="nav-link" href="{{ asset('profile/profile') }}">
        <span class="username"><?php 
        echo session('user_details');
        ?>
        </span>
      </a>
    </div>
 
 </li>
</ul>
</nav>