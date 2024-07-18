<x-layout>
    <div class="container custom-margin-top-form">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                <h1 class="text-center mb-3">{{__('ui.registrati')}}</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- USERNAME --}}
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput"
                            value="{{ old('name') }}">
                        <label for="floatingInput">{{__('ui.username')}}</label>
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput2"
                            placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput2">{{__('ui.email')}}</label>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">{{__('ui.password')}}</label>
                    </div>

                    {{-- CONFERMA PASSWORD --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">{{__('ui.password_confirmation')}}</label>
                    </div>

                    {{-- BOTTONI --}}
                    <div class="d-flex ">
                        <button class="btn btn-quar me-2" type="submit">{{__('ui.registrati')}}</button>
                        <button class="btn btn-quar me-2" type="reset">{{__('ui.cancella')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</x-layout>
