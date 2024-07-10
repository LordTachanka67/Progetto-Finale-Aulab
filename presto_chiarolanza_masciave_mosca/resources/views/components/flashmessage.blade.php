@if (session('success'))
    <div class="alert alert-success container w-50 text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger container w-50 text-center">
        {{ session('danger') }}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger container w-50 text-center">
    <ul>
        @foreach ($errors->all() as $error)
           <li>{{$error}}</li> 
        @endforeach
    </ul>
</div>
@endif