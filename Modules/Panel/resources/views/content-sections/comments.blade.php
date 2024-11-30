{{-- Comments --}}
@can(config('permissions_list.COMMENT_INDEX', false))
    <div class="col-12">
        <div class="portlet box shadow min-height-500">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h3 class="title">
                        <i class="icon-bubbles"></i>
                        Comments
                    </h3>
                </div><!-- /.portlet-title -->
                <div class="buttons-box">
                    <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                       aria-label="Fullscreen" data-bs-original-title="Fullscreen">
                        <i class="icon-size-fullscreen"></i>
                        <div class="paper-ripple">
                            <div class="paper-ripple__background"></div>
                            <div class="paper-ripple__waves"></div>
                        </div>
                    </a>
                    <a class="btn btn-sm btn-default btn-round btn-close" rel="tooltip"
                       aria-label="Close" data-bs-original-title="Close">
                        <i class="icon-trash"></i>
                        <div class="paper-ripple">
                            <div class="paper-ripple__background"></div>
                            <div class="paper-ripple__waves"></div>
                        </div>
                    </a>
                </div><!-- /.buttons-box -->
            </div><!-- /.portlet-heading -->
            <div class="portlet-body">
                <div class="table-responsive" style="overflow-x: auto !important;">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Comment Text</th>
                            <th>Commenter</th>
                            <th>Guest</th>
                            <th>Comment Status</th>
                            <th>Reply</th>
                            <th>Model</th>
                            <th>Creation Date</th>
                            @canany([
                                config('permissions_list.COMMENT_APPROVE', false),
                                config('permissions_list.COMMENT_REJECT', false),
                                config('permissions_list.COMMENT_SHOW', false),
                                config('permissions_list.COMMENT_DESTROY', false)
                            ])
                                <th>Actions</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ str($comment->comment)->limit(20) }}</td>
                                <td>{{ $comment->commenterName() }}</td>
                                <td class="{{ status_class(!$comment->isGuest()) }}">{{ $comment->isGuest() ? 'Yes' : 'No' }}</td>
                                <td class="{{ $comment->setStatusClass() }} status">{{ $comment->getStatus() }}</td>
                                <td class="reply">{{ $comment->parent ? "{$comment->parent->commenterName()} (id: {$comment->parent->id})" : 'None' }}</td>
                                <td>{{ $comment->commentable_type }}</td>
                                <td class=" text-left nowrap">{{ \Carbon\Carbon::parse($comment->created_at)->format(config('common.datetime_format')) }}</td>
                                @canany([
                                    config('permissions_list.COMMENT_APPROVE', false),
                                    config('permissions_list.COMMENT_REJECT', false),
                                    config('permissions_list.COMMENT_SHOW', false),
                                    config('permissions_list.COMMENT_DESTROY', false)
                                ])
                                    <td>
                                        <div class="d-flex gap-2">
                                            @can(config('permissions_list.COMMENT_APPROVE', false))
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
                                            @can(config('permissions_list.COMMENT_REJECT', false))
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
                                            @can(config('permissions_list.COMMENT_SHOW', false))
                                                <a class="btn btn-sm btn-info btn-icon round d-flex justify-content-center align-items-center"
                                                   rel="tooltip" aria-label="View Comment" data-bs-original-title="View Comment"
                                                   href="{{ route(config('app.panel_prefix', 'panel') . '.comments.show', $comment->id) }}">
                                                    <i class="icon-eye"></i>
                                                </a>
                                            @endcan
                                            @can(config('permissions_list.COMMENT_DESTROY', false))
                                                <x-common-delete-button :route="route(config('app.panel_prefix', 'panel') . '.comments.destroy', $comment->id)"/>
                                            @endcan
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.portlet-body -->
        </div><!-- /.portlet -->
    </div>
@endcan
