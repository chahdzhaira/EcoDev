@foreach ($latestPublications as $publication)
    <div class="blog_1r1i row">
        <div class="col-md-3 pe-0 col-3">
            <div class="blog_1r1il">
                <div class="grid clearfix">
                    <figure class="effect-jazz mb-0">
                        <a href="{{ route('publication.show', $publication->id) }}">
                            <img src="{{ asset($publication->content) }}" class="w-100" alt="{{ $publication->title }}">
                        </a>                   
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-9">
            <div class="blog_1r1ir">
                <h6 class="fw-bold lh-1"><a href="blog_detail.html">{{$publication->title}}</a></h6>
                    <h6 class="text-muted font_14 mb-0"><i class="fa fa-calendar col_green me-1"></i> Feb 21, 2022</h6>
            </div>
        </div>
    </div><hr>
@endforeach