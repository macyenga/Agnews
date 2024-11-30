<div class="comments-form">
<h3 class="title-normal">Share Your Opinion</h3>

    <form role="form" action="{{ route('comments.store') }}" method="POST">
        @if(session()->has('errors'))
            <div class="alert alert-danger">
            <strong>Error!</strong>
            @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @include('front::single-article.partials.comment-form-inputs')
    </form><!-- Form end -->
</div><!-- Comments form end -->
