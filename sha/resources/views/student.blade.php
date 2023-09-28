</div class="studentform">
  <form action="{{ route('insert') }}" method="POST">
  @csrf
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" ><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="password">password:</label><br>
    <input type="text" id="password" name="password"><br>
    <input type="submit" value="Submit">
  </form> 
</div>
</div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>FirstName</th>
        <th>LasttName</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($viewtable as $value)
      <tr>
        <td>{{ $value->id }}</td>
        <td>{{ $value->firstname }}</td>
        <td>{{ $value->lasttname }}</td>
        <td>{{ $value->email }}</td>
        <td>
          <button type="button" onclick="window.location='student.edit/{{$value->id}}'">Edit</button>
        </td>
        <td>
          <button type="button" onclick="window.location='delete/{{ $value->id }}'">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>