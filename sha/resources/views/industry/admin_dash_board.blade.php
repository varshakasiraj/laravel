<head>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @include('industry.industry_header')
</head>
@if(Route::current()->getName() == 'admin_dashboard')
<div class="container text-center">
    <div class="row">
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/admin.jpeg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Admin</h5>
                <a href="{{asset('/industry/adminProfile/1')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/manager.jpg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Manager</h5>
                <a href="{{asset('/industry/adminProfile/2')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/supervisor.jpeg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">supervisor</h5>
                <a href="{{asset('/industry/adminProfile/3')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/worker.jpg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Worker</h5>
                <a href="{{asset('/industry/adminProfile/4')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endif
@if(Route::current()->getName() == 'manager_dashboard')
<div class="container text-center">
    <div class="row">
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/manager.jpg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Manager</h5>
                <a href="{{asset('/industry/adminProfile/2')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/supervisor.jpeg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">supervisor</h5>
                <a href="" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/worker.jpg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Worker</h5>
                <a href="{{asset('/industry/adminProfile/4')}}"class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endif
@if(Route::current()->getName() == 'supervisor_dashboard')
<div class="container text-center">
    <div class="row">
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/supervisor.jpeg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">supervisor</h5>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/worker.jpg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Worker</h5>
                <a href="{{asset('/industry/workerProfile')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endif
@if(Route::current()->getName() == 'worker_dashboard')

<div class="container text-center">
    <div class="row">
        <div class="card" style="width: 15rem;">
            <img src="{{URL::asset('/storage/image/worker.jpg')}}" class="card-img-top" alt="..." height='300'>
            <div class="card-body">
                <h5 class="card-title">Worker</h5>
                <a href="{{asset('/industry/workerProfile')}}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@endif

<footer>
  @include('cms.cmsfooter')
</footer>