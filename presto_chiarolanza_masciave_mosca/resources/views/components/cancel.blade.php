@if (session('cancel'))
    <div class="alert alert-info container w-50 text-center">
        {{ session('success') }}
        <form action="{{route('article.cancel')}}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn w-50 py-2">Annulla l'ultima azione</button>
        </form> 
    </div>
@endif