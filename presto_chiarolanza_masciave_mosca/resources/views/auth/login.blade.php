<x-layout>

    <div class="container custom-margin-top-form">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">

                <h1 class="text-center mb-3">{{__('ui.accedi')}}</h1>

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
                        <label for="email">{{__('ui.email')}}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password">
                        <label for="password">{{__('ui.password')}}</label>
                    </div>
                    <button class="btn btn-quar" type="submit">{{__('ui.accedi')}}</button>
                    <a class="btn btn-quar" href="{{ route('register') }}">{{__('ui.nonSeiRegistrato')}}</a>
                </form>
            </div>
        </div>
    </div>



</x-layout>
