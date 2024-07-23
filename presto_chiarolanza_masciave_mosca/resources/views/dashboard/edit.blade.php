<x-layout>

    <x-masthead h1="{{ __('ui.modificaArticolo') }}" />

    {{-- <livewire:edit-article-form :article="$article" --}}
    {{-- /> --}}

    {{--  @livewire('edit-article-form', ['article' => $article, 'oldImages' => $oldImages])
 --}}





    <div class="container">
        <a class="btn btn-quar mb-3" href="{{ route('dashboard.index') }}"><i class="bi bi-arrow-bar-left"></i>
            {{ __('ui.tornaDashboard') }}</a>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <x-flashmessage />
                <form action="{{ route('dashboard.update', ['article' => $article]) }}" method="POST"
                    enctype="multipart/form-data">

                    @method('PUT')
                    @csrf


                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('ui.titolo') }}</label>
                        <input type="text" value="{{ $article->title }}" name="title" class="form-control"
                            id="title">
                    </div>


                    <div class="mb-3">
                        <label for="description">{{ __('ui.descrizione') }}</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"
                            placeholder="{{ __('ui.descrivi') }}">{{ $article->description }}
                        </textarea>
                    </div>


                    <div class="mb-3">
                        <label for="category">{{ __('ui.categoria') }}</label>
                        <select class="form-select" name="category" id="category">
                            <option selected disabled>{{ __('ui.selezionaCategoria') }}</option>
                            @foreach ($categories as $category)
                                <option @selected($article->category_id == $category->id) value="{{ $category->id }}">
                                    {{ __('ui.' . $category->name) }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('ui.prezzo') }}</label>
                        <input type="float" value="{{ $article->price }}" name="price" class="form-control"
                            id="price">
                    </div>



                    <button type="submit" class="btn btn-quar">{{ __('ui.inserisci') }}</button>
                </form>
            </div>
        </div>
    </div>


</x-layout>
