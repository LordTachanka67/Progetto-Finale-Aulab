<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 custom-margin-top-form">
                <h1 class="text-center mb-5">{{ __('ui.lavoraConNoi') }}</h1>
                <x-flashmessage />
                <form action="{{ route('revisorApplication') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">{{ __('ui.email') }}</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="{{ Auth::user()->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <textarea class=" form-control" cols="30" rows="5" name="body"
                            placeholder="{{ __('ui.percheRevisore') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-quar">{{ __('ui.inviaCandidatura') }}</button>
                </form>

            </div>
        </div>
    </div>
</x-layout>
