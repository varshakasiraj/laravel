</div class="studentform">
  <form action="{{ route('profileUpdate') }}" method="POST">
  @csrf
  @foreach($edit_profile as $value)
        <label for="fname">name:</label><br>
        <input type="text" id="fname" name="name" value="{{$value->name}}"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"  value="{{ $value->email }}"><br>
        <label for="password">password:</label><br>
        <input type="password" id="password" name="password"  value=""><br>
        <input type="submit" value="Submit">
        <input type="hidden" id="id" name="id" value='{{$value->id}}'>
    @endforeach
  </form> 
</div>