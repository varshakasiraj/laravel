<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
    <h1>Manager Details</h1>
<table class="table">
  <thead>
    <tr class="table-info">
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  @foreach($user as $value)
    <tr class="table-danger">
     <td>{{$value->name}}</td>
      <td>{{$value->email}}</td>
    </tr>
    @endforeach
  </tbody>
</body>
<footer>
  @include('cms.cmsfooter')
</footer>