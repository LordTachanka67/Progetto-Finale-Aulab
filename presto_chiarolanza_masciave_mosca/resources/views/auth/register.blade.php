<x-layout>
    <div class="container custom-margin-top">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                <h1 class="text-center mb-3">Crea il tuo account</h1>

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
                        <label for="floatingInput">UserName</label>
                    </div>

                    {{-- EMAIL --}}
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com" value="{{ old('email') }}">
                        <label for="floatingInput">Email</label>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>

                    {{-- CONFERMA PASSWORD --}}
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword"
                            placeholder="Password">
                        <label for="floatingPassword">Conferma Password</label>
                    </div>

                    {{-- BOTTONI --}}
                    <div class="d-flex ">
                        <button class="btn btn-quar me-2" type="submit">Registrati</button>
                        <button class="btn btn-quar me-2" type="reset">Cancella</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</x-layout>
