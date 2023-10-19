<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<div class="">
  <form class="form" action="{{route('user_register')}}" method="POST">
  <div class="">
      <label for="name" class="">Name</label><br>
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
        <input type="hidden" id="employee" name="role" value="4">
    </div><br>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
  <footer>
  @include('cms.cmsfooter')
</footer>