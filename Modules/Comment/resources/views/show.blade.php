@extends('panel::layouts.master', ['title' => 'View Comment'])

@section('content')

    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.comments.index') }}">Comments List</a></li>
        <li><a>View Comment</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="far en-comment"></i>
                            View Comment
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box ">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Fullscreen" data-bs-original-title="Fullscreen">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
                        </a>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <div class="comment-box">
                        <div class="comment">
                            <a href="#">
                                <img src="{{ $comment->commenterImageLink() }}" class="img-circle" alt="{{ $comment->commenterName() }}">
                                <span class="user">
                                {{ ($comment->isGuest() ? 'Guest User: ' : '') . $comment->commenterName() }}
                            </span>
                            </a>
                            <span class="float-end text-muted">
                            <i class="icon-clock"></i>
                            <span class="" style="display: inline-block">
    {{ \Carbon\Carbon::parse($comment->created_at)->ago() }}
</span>
                        </span>
                            <p class="my-3 mx-5">
                                <x-markdown class="my-2 mx-5">
                                    {{ $comment->comment }}
                                </x-markdown>
                            </p>
                        </div>
                        <div class="actions d-flex justify-content-end gap-1">
                            @can(config('permissions_list.ARTICLE_UPDATE', false))
                                @if ($comment->status !== get_class($comment)::APPROVED)
                                    <form action="{{ route(config('app.panel_prefix', 'panel') . '.comments.approve', $comment->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-sm btn-success btn-icon round d-flex justify-content-center align-items-center"
                                                rel="tooltip" aria-label="Approve Comment" data-bs-original-title="Approve Comment">
                                            <i class="icon-check"></i>
                                        </button>
                                    </form>
                                @endif
                            @endcan
                            @can(config('permissions_list.ARTICLE_UPDATE', false))
                                @if ($comment->status !== get_class($comment)::REJECTED)
                                    <form action="{{ route(config('app.panel_prefix', 'panel') . '.comments.reject', $comment->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-sm btn-warning btn-icon round d-flex justify-content-center align-items-center"
                                                rel="tooltip" aria-label="Reject Comment" data-bs-original-title="Reject Comment">
                                            <i class="icon-close"></i>
                                        </button>
                                    </form>
                                @endif
                            @endcan
                            @can(config('permissions_list.ARTICLE_DESTROY', false))
                                <x-common-delete-button :route="route(config('app.panel_prefix', 'panel') . '.comments.destroy', $comment->id)"/>
                            @endcan
                        </div>
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
            </div>
        </div>
@endsection
