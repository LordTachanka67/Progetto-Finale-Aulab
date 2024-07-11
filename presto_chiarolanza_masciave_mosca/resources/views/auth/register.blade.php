<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
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
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">UserName</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Conferma Password</label>
                    </div>
                    {{-- FORM ANTONIO --}}
                    {{-- <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                        aria-describedby="emailHelp">
                    </div> --}}
                    {{-- <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                        id="password_confirmation">
                    </div> --}}
                    <div class="d-flex ">
                        <button class="btn btn-quar me-2" type="submit">Registrati</button>
                        <button class="btn btn-quar me-2" type="reset">Cancella</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
</x-layout>
