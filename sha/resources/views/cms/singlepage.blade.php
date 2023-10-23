<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cmspage.css') }}">
    @include('cms.cmsheader')
</head>
<div class="singlePageContainer">
        @foreach(json_decode($viewProduct) as $value)
        <div class="container">
            <h2 class="single_page_title">{{$value->title}}</h2>
            <img src="{{URL::asset('/storage/'.$value->banner)}}"  alt="..." width='350'>
                <h3 class="card-title">{{$value->title}}</h3>
                <p class="singlepage_paragraph">{{$value->description}}</p>
            </div>
        </div>
        @endforeach
</div>
<footer>
@include('cms.cmsfooter')
</footer>