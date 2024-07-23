@if (session('cancel'))
    <div class="alert btn btn-quar   container w-50 text-center">
        {{ session('success') }}
        <form action="{{ route('article.cancel') }}" method="POST" class="justify-content-center">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn w-50 py-2 px-0 text-center">{{ __('ui.annullaAzione') }}</button>
        </form>
    </div>
@endif
