<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @include('industry.industry_header')
</head>
<div class="">
  <form class="form" action="{{route('update_details')}}" method="POST">
  @foreach($user as $value)
    <div class="">
      <label for="name" class="">Name</label><br>
      <input type="text"  id="name" placeholder="varsha"  name="name" value="{{$value->name}}">
    </div>
    <div class="">
      <label for="Email1" class="">Email address</label><br>
      <input type="email"  id="Email1" placeholder="email@example.com"  name="email" value="{{$value->email}}">
    </div>
    <div class="">
      <label for="Password1" class="">Password</label><br>
      <input type="Password"  id="Password1" placeholder="Password" name="password" value="{{$value->password}}">
    </div>
    <div class="">
        <label for="role" class="role">Roles</label><br>
            <input type="radio" id="admin" name="role" value="1" >
            <label for="admin">admin</label><br>
            <input type="radio" id="manager" name="role"value="2">
            <label for="manager">manager</label><br>
            <input type="radio" id="supervisor" name="role" value="3">
            <label for="supervisor">supervisor</label><br>
            <input type="radio" id="worker" name="role" value="4">
            <label for="worker">worker</label><br>
    </div>
    <div class="">
        <input type="hidden" id="id" name="id" value="{{$value->id}}">
    </div>
    <br>
    @endforeach
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
  <footer>
  @include('cms.cmsfooter')
</footer>