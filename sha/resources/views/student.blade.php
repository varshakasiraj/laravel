
<head>
<script type="text/javascript" src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}".>
<link rel="stylesheet" href="{{ asset('css/header.css') }}".>
@include('layout.student_header')
</head>
<body>
<div class="studentform">
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
<div id="mytablecontatiner">
<table class="table table-striped" id="mytable">
</table>
</div>
</body>
<footer>
@include('layout.footer')
</footer>
<script  type="text/javascript">
  var  viewtable = "{{$viewtable}}";
  var postlist = JSON.parse(viewtable.replace(/&quot;/g,'"'));
  $('#mytable').DataTable({
      data:postlist,
      columns: [
         { data:'id',title:'Id'} ,
         { data:'firstname',title:'Firstname' },
         { data:'lasttname',title:'Lasttname' } ,
         { data:'email',title:'Email' } ,
         {defaultContent:'<button value=>Edit</button>',title:'edit'}
      ],
  }); 
  console.log($('#mytable').rows().data(id)); 
</script>