<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}".>
    <link rel="stylesheet" href="{{ asset('css/cmspage.css') }}".>
    @include('cms.cmsheader')
</head>
<body>
<div class="container text-center">
    <div class="row">
        @foreach(json_decode($viewProduct) as $value)
        <div class="card" style="width: 15rem;">
        <a href="singlepage/{{$value->id}}"><img src="{{URL::asset('/storage/image/'.$value->banner)}}" class="card-img-top" alt="..." height='300'></a>
        <div class="card-body">
            <div class="cmstitle">
                <h5 class="card-title">{{$value->title}}</h5>
            </div>
            <a href="cms-single/{{$value->id}}" class="btn btn-primary">{{$value->description}}</a>
        </div>
        </div>
        @endforeach
    </div>
</div>
</body>
<footer>
@include('cms.cmsfooter')
</footer>