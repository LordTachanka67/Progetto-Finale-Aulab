@if (session('success'))
    <div class="alert alert-success container w-50 text-center">
        {{ __('ui.success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger container w-50 text-center">
        {{ __('ui.danger') }}
    </div>
@endif

{{-- @if ($errors->any())
<div class="alert alert-danger container w-50 text-center">
    <p>{{ __('ui.validation_errors') }}</p>
    <ul>
        @foreach ($errors->all() as $error)
           <li>{{$error}}</li> 
        @endforeach
    </ul>
</div>
@endif --}}
