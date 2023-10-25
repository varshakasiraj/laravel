<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @include('industry.industry_header')
</head>
<style>
    .body{
        margin: auto;
        width: 50%;
        border: 3px ;
        padding: 10px;
    }
</style>
<body>
@if(Route::current()->getName() == 'workerlocation' || Route::current()->getName() == 'EditworkerLocation')
  <div class="body">
    <h1>Workers Location Details</h1>
    <table class="table">
      <thead>
        <tr class="table-info">
          <th scope="col">Name</th>
          <th scope="col">State</th>
          <th scope="col">City</th>
          <th scope="col">Address</th>
          <th scope="col">pincode</th>
          <th scope="col" colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($location as $value)
        <tr class="table-danger">
          <td>{{$value->name}}</td>
          <td>{{$value->state}}</td>
          <td>{{$value->city}}</td>
          <td>{{$value->address}}</td>
          <td>{{$value->pincode}}</td>
              <td><a href="{{asset('/industry/editLocationForm/'.$value->id)}}">Edit</a></td>
              <td><a href="{{asset('/industry/deleteAdmin/'.$value->id)}}">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif
@if(Route::current()->getName() == 'editLocationForm')
<form class="form" action="{{route('updateLocation')}}" method="POST">
    @foreach($editlocation as $value)
      <div class="">
        <label for="state" class="">State</label><br>
        <input type="text"  id="state"  name="state" value="{{$value->state}}">
      </div>
      <div class="city">
        <label for="city" class="">City</label><br>
        <input type="text"  id="city"   name="city" value="{{$value->city}}">
      </div>
      <div class="">
        <label for="address" class="">Address</label><br>
        <input type="text"  id="address"   name="address" value="{{$value->address}}">
      </div>
      <div class="">
        <label for="pincode" class="">Pincode</label><br>
        <input type="text"  id="pincode"   name="pincode" value="{{$value->pincode}}">
      </div>
      <div class="">
        <input type="hidden" id="id" name="id" value="{{$value->id}}">
      </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endif
</body>
<footer>
  @include('cms.cmsfooter')
</footer>
