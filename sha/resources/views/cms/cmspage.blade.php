<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}".>
    <link rel="stylesheet" href="{{ asset('css/cmspage.css') }}".>
</head>
<div class="container text-center">
    
    <div class="row">
        @foreach(json_decode($viewProduct) as $value)
        {{$value->banner}}
        <div class="card" style="width: 18rem;">
        <img src="{{URL::asset('/storage/image/$value->banner')}}" class="card-img-top" alt="..." height='200'>
        <div class="card-body">
            <h5 class="card-title">{{$value->title}}</h5>
            <a href="singlepage/{$value->id}" class="btn btn-primary">{{$value->description}}</a>
        </div>
        </div>
        @endforeach
    </div>
</div>