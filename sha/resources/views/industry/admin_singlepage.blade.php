<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @include('industry.industry_header')
</head>
<style>
    body{
        margin: auto;
        width: 50%;
        border: 3px ;
        padding: 10px;
    }
</style>
<body>
    @if($id == 1)
    <h1>Admin Details</h1>
    @elseif($id == 2)
    <h1>Manager Details</h1>
    @elseif($id == 3)
    <h1>Supervisor Details</h1>
    @else
    <h1>Worker Details</h1>
    @endif
<table class="table">
  <thead>
    <tr class="table-info">
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($user as $value)
    <tr class="table-danger">
        <td>{{$value->name}}</td>
        <td>{{$value->email}}</td>
        <td><a href="{{asset('/industry/editAdmin/'.$value->id)}}">Edit</a></td>
        <td><a href="{{asset('/industry/deleteAdmin/'.$value->id)}}">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</body>
<footer>
  @include('cms.cmsfooter')
</footer>