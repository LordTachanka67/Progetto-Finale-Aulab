<div class="container mb-0">
    <div class="row justify-content-center text-center">
        <div class="col-12 d-sm-none fixed-bottom ">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header text-center">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach ($categories as $category)
                                <a class="btn btn-quar m-1 category-btn" aria-current="page"
                                    href="{{ route('categories.byCategory', compact('category')) }}">{{ __("ui.$category->name") }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
