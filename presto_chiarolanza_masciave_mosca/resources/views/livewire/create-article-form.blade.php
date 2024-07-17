<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <x-flashmessage />
                <form wire:submit="store" enctype="multipart/form-data">
                    @csrf
                    {{--  IMMAGINI --}}
                    <div class="mb-3">
                        <input type="file" wire:model.live="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
                        @error('temporary_images.*')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        @error('temporary_images')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Anteprima:</p>
                                <div>
                                    @foreach ($images as $image)
                                    <div class="d-flex flex-column mb-b col">
                                        <div class="img-preview" style="background-image: url({{$image->temporaryUrl()}})">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        

                    @endif

                    {{-- TITOLO --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" value="{{ old('title') }}" wire:model.live="title" class="form-control" @error('title') is-invalid @enderror id="title">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    {{-- DESCRIZIONE --}}
                    <div class="mb-3">
                        <label for="description">Descrizione</label>
                        <textarea wire:model.live="description" id="description" class="form-control" @error('description') is-invalid @enderror  cols="30" rows="10" placeholder="Descrivi il tuo annuncio...">
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    {{-- CATEGORIA --}}
                    <div class="mb-3">
                        <label for="category">Categoria</label>
                        <select wire:model.live="category_id" class="form-select" @error('description') is-invalid @enderror aria-label="Default select example" id="category">
                            <option selected disabled>Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    {{-- PREZZO --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="float" value="{{ old('price') }}" wire:model.live="price" class="form-control" @error('price') is-invalid @enderror id="price">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
            
                    <button type="submit" class="btn btn-quar">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</div>
