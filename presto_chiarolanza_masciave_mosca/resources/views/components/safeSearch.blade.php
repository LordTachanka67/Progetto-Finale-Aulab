@foreach ($article->images as $key => $image)
    <div class="col-12">
        <div class="mb-3">
            <div class="row g-0 border border-5 shadow p-3 rounded-3">
                <div class="col-md-2">
                    <img src="{{ $image->getUrl(400, 400) }}"
                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}" class="img-fluid">
                </div>
                <div class="col-md-4 ps-3">
                    <div class="">
                        <h5>{{ __('ui.labels') }}</h5>
                        @if ($image->labels)
                            @foreach ($image->labels as $label)
                                #{{ $label }}
                            @endforeach
                        @else
                            <p class="fst-italic">{{ __('ui.noLabels') }}</p>
                        @endif
                    </div>
                </div>




                <div class="col-md-4 ps-3">
                    <div class="">
                        <h5 class=" ">{{ __('ui.rating') }}</h5>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->adult }}"></div>
                            </div>
                            <div class="col-10">{{ __('ui.adult') }}
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->violence }}"></div>
                            </div>
                            <div class="col-10">{{ __('ui.violence') }}</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->spoof }}"></div>
                            </div>
                            <div class="col-10">{{ __('ui.spoof') }}</div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->racy }}"></div>
                            </div>
                            <div class="col-10">{{ __('ui.racy') }}</div>

                        </div>

                        <div class="row justify-content-center">


                            <div class="col-2">
                                <div class="text-center mx-auto {{ $image->medical }}"></div>
                            </div>
                            <div class="col-10">{{ __('ui.medical') }}</div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
@endforeach
