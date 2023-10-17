<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('manager/bootstrap.manager') }}"/>
    <link rel="stylesheet" href="{{ asset('manager/login.manager') }}"/>
</head>
<div class="">
  <form class="form" action="{{route('user_login')}}" method="POST">
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
        <input type="radio" id="admin" name="role" value="1">
        <label for="admin">admin</label><br>
        <input type="radio" id="manager" name="role" value="2">
        <label for="manager">manager</label><br>
        <input type="radio" id="supervisor" name="role" value="3">
        <label for="supervisor">supervisor</label><br>
        <input type="radio" id="employee" name="role" value="4">
        <label for="employee">employee</label>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
  </form>