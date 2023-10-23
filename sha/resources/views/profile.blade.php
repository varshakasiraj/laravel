<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}"/>
</head>
<form class="form"  method="POST">
    <div>
        <img src="{{URL::asset('/storage/image/falls.jfif')}}" alt="Avatar" class="avatar">
    </div>
    <div class="view-or-delete">
    @foreach($user_details as $value)
        <div>
            <a class="btn" href="profile_edit/{{$value->id}}">Edit Profile</a>
        </div>
        <div>
            <a  class="btn" href="logout/{{$value->id}}">log out</a>
        </div>
    @endforeach
    </div>
</form>
