<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <x-flashmessage />
                <form wire:submit="store" enctype="multipart/form-data">
                    @csrf


                    {{-- TITOLO --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('ui.titolo') }}</label>
                        <input type="text" value="{{ old('title') }}" wire:model.live="title" class="form-control"
                            @error('title') is-invalid @enderror id="title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- DESCRIZIONE --}}
                    <div class="mb-3">
                        <label for="description">{{ __('ui.descrizione') }}</label>
                        <textarea wire:model.live="description" id="description" class="form-control" @error('description') is-invalid @enderror
                            cols="30" rows="10" placeholder="{{ __('ui.descrivi') }}">
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- CATEGORIA --}}
                    <div class="mb-3">
                        <label for="category">{{ __('ui.categoria') }}</label>
                        <select wire:model.live="category_id" class="form-select"
                            @error('description') is-invalid @enderror aria-label="Default select example"
                            id="category">
                            <option selected disabled>{{ __('ui.selezionaCategoria') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ __('ui.' . $category->name) }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PREZZO --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">{{ __('ui.prezzo') }}</label>
                        <input type="float" value="{{ old('price') }}" wire:model.live="price" class="form-control"
                            @error('price') is-invalid @enderror id="price">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{--  IMMAGINI --}}
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">{{ __('ui.carica') }}</label>
                        <input id="imageUpload" type="file" wire:model.live="temporary_images" multiple
                            class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
                        @error('temporary_images.*')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        @error('temporary_images')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        {{-- @dd($images) --}}
                        <div class="row d-flex">
                            <div class="col-12 mt-2">
                                <p>{{ __('ui.anteprima') }}:</p>
                                <p>{{ __('ui.haiSelezionato') }} {{ count($images) }} {{ __('ui.immagini') }}</p>
                            </div>
                            <div class="row">
                                @foreach ($images as $key => $image)
                                    <div class="mb-3 col-3">
                                        <div class="img-preview"
                                            style="background-image: url({{ $image->temporaryUrl() }})">
                                            <button class="btn btn-quar bg-main" type="button"
                                                wire:click="removeImage({{ $key }})"><i
                                                    class="bi bi-x-lg"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    @endif
                    <button type="submit" class="btn btn-quar">{{ __('ui.inserisci') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
