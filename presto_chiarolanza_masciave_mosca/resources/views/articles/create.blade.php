<x-layout>

    <x-masthead h1='Crea un nuovo articolo' />

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- TITOLO --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>

        {{-- DESCRIZIONE --}}
        <div class="mb-3">
            <label for="desciption">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Tutto comincia con..."></textarea>
        </div>

        {{-- CATEGORIA --}}

        <select name="category_id" class="form-select" aria-label="Default select example">
            <option selected disabled>Seleziona una categoria</option>
            @foreach ($categories as $category)
                <option  value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach

        </select>
       
        {{-- PREZZO --}}
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="float" name="price" class="form-control" id="price">
        </div>


        {{-- <div class="mb-3">
            <label for="img" class="form-label">Copertina</label>
            <input type="file" name="img" class="form-control" id="img">
        </div> --}}
        <button type="submit" class="btn btn-light">Inserisci</button>
    </form>

</x-layout>
