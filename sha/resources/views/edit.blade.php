</div class="studentform">
  <form action="{{ route('update') }}" method="POST">
  @csrf
  @foreach($student_deatails as $value)
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="{{$value->firstname}}"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"  value="{{ $value->lasttname }}"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"  value="{{ $value->email }}"><br>
        <label for="password">password:</label><br>
        <input type="text" id="password" name="password"  value="{{ $value->password }}"><br>
        <input type="submit" value="Submit">
        <input type="hidden" id="id" name="id" value='{{$value->id}}'>
    @endforeach
  </form> 
</div>