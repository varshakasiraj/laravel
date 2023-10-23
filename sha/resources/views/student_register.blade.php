<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>
</head>
<div class="">
  <form class="form" action="{{ route('student_register') }}" method="POST">
  <div class="">
      <label for="name" class="">name</label><br>
      <input type="text"  id="name" placeholder="varsha"  name="name">
    </div>
    <div class="">
      <label for="Email1" class="">Email address</label><br>
      <input type="email"  id="Email1" placeholder="email@example.com"  name="email">
    </div>
    <div class="">
      <label for="Password1" class="">Password</label><br>
      <input type="password"  id="Password1" placeholder="Password" name="password">
    </div>
    <div class="">
      <div class="">
        <input type="checkbox" class="" id="dropdownCheck">
        <label class="form-check-label" for="dropdownCheck">
          Remember me
        </label>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <!-- <div class="dropdown-divider"></div>
  <a class="" href="#">New around here? Sign up</a>
  <a class="" href="#">Forgot password?</a>
</div> -->