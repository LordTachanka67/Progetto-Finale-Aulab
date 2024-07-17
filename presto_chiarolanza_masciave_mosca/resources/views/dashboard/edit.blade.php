<x-layout>

    <x-masthead h1="Modifica l'articolo" />

    {{-- <livewire:edit-article-form :article="$article"
     /> --}}

     {{-- @livewire('edit-article-form', ['article' => $article]) --}}

     
    



    <div class="container">
        <a class="btn btn-quar mb-3" href="{{ route('dashboard.index') }}"><i class="bi bi-arrow-bar-left"></i> TORNA ALLA DASHBOARD</a>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <x-flashmessage />
                <form action="{{route('dashboard.update', ['article' => $article])}}" method="POST" enctype="multipart/form-data">
                    
                    @method('PUT')
                    @csrf
            
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" value="{{ $article->title }}" name="title" class="form-control"  id="title">
                    </div>
            
                    
                    <div class="mb-3">
                        <label for="description">Descrizione</label>
                        <textarea name="description"  id="description" class="form-control"   cols="30" rows="10" 
                        placeholder="Descrivi il tuo annuncio...">{{ $article->description }}
                        </textarea>
                    </div>
            
                    
                    <div class="mb-3">
                        <label for="category">Categoria</label>
                        <select  class="form-select" name="category" id="category">
                            <option selected disabled>Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option @selected($article->category_id == $category->id)  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                   
              
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="float" value="{{ $article->price }}" name="price" class="form-control"  id="price">
                    </div>

              
            
                    <button type="submit" class="btn btn-quar">Inserisci</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>