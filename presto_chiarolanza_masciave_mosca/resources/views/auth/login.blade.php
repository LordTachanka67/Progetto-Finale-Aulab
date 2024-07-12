<x-layout>

    <div class="container  custom-margin-top">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                <h1 class="text-center mb-3">Accedi</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="name@example.com">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button class="btn btn-quar" type="submit">Accedi</button>
                    <a class="btn btn-quar" href="{{ route('register') }}">Non sei registrato?</a>
                </form>
            </div>
        </div>
    </div>



</x-layout>
