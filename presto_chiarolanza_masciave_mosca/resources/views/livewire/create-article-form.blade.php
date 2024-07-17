<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <x-flashmessage />
                <form wire:submit="store" enctype="multipart/form-data">
                    @csrf
                   

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

                     {{--  IMMAGINI --}}
                     <div class="mb-3">
                        <label for="imageUpload" class="form-label">Carica una o più immagini</label>
                        <input id="imageUpload" type="file" wire:model.live="temporary_images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
                        @error('temporary_images.*')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        @error('temporary_images')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                    {{-- @dd($images) --}}
                        <div class="row d-flex">
                            <div class="col-12 mt-2">
                                <p>Anteprima:</p>
                                <p>Hai selezionato {{count($images)}} immagini</p>
                            </div>
                                <div class="row">
                                    @foreach ($images as $key => $image)
                                    <div class="mb-3 col-3">
                                        <div class="img-preview" style="background-image: url({{$image->temporaryUrl()}})">
                                            <button class="btn btn-quar bg-main" type="button" wire:click="removeImage({{$key}})"><i class="bi bi-x-lg"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        </div>
                        

                    @endif
                    <button type="submit" class="btn btn-quar">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</div>
