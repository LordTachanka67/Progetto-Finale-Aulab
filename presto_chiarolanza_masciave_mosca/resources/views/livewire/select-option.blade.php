<div>
    <div class="row">
        <div class="col-12">
            <div class="form-check form-switch position-relative mb-4">
                <span class="form-check-label" id="griglia">{{ __('ui.griglia') }}</span>
                <input wire:click="increment" class="form-check-input" type="checkbox" role="switch" id="switch"
                    @if ($selectedOption % 2 != 0) checked @endif>
                <span class="form-check-label" id="elenco">{{ __('ui.elenco') }}</span>

                {{-- <label class="form-check-label" for="flexSwitchCheckChecked">Opzione</label> --}}
            </div>
        </div>

        @switch($selectedOption %2 == 0)
            @case(true)
                @if ($articles_pending->isEmpty())
                    <p>{{ __('ui.nessunArticoloDaRevisionare') }}</p>
                @else
                    @foreach ($articles_pending as $article)
                        <div class="col-12 col-md-5 col-lg-3">
                            <x-card-pending :article="$article" />
                            {{--  <x-safeSearch :article="$article" /> --}}
                        </div>
                    @endforeach
                @endif
            @break

            @case(false)
                @if ($articles_pending->isEmpty())
                    <p>{{ __('ui.nessunArticoloDaRevisionare') }}</p>
                @else
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('ui.titolo') }}</th>
                                    <th scope="col">{{ __('ui.prezzo') }}</th>
                                    <th scope="col">{{ __('ui.user') }}</th>
                                    <th scope="col">{{ __('ui.azioni') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles_pending as $article)
                                    <tr>
                                        <th scope="row">{{ $article->id }}</th>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ number_format($article->price, 2, ',') }}</td>
                                        <td>{{ $article->user->name }}</td>
                                        <td><a href="{{ route('revisor.show', $article) }}"
                                                class="btn btn-quar">{{ __('ui.vaiArticolo') }}</a></td>



                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            @break

            @default
        @endswitch


    </div>
</div>
