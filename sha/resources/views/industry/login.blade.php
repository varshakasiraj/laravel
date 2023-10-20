<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @include('industry.industry_header')
</head>
<div class="">
  <form class="form" action="{{route('user_login')}}"  method="POST">
    <div class="">
      <label for="Email1" class="">Email Address</label><br>
      <input type="email"  id="Email1" placeholder="email@example.com"  name="email">
    </div>
    <div class="">
      <label for="Password1" class="">Password</label><br>
      <input type="password"  id="Password1" placeholder="Password" name="password">
    </div><br>
    <button type="submit" class="btn btn-primary">Sign in</button>
    <div>
    <a  class="new-sign-in" href="{{asset('/industry/user_register')}}">New around here? Sign up</a>
  </div>
  </form>
</div>
@if(Route::current()->getName() == 'error')
<h6 class="error">Invalid Email or Password</h6>
@endif
<footer>
  @include('cms.cmsfooter')
</footer>