{{-- Articles --}}
@can(config('permissions_list.ARTICLE_INDEX', false))
    <div class="col-12">
        <div class="portlet box shadow min-height-500">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h3 class="title">
                        <i class="icon-globe"></i>
                        Articles
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
                <div class="table-responsive overflow-x-auto">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Featured Image</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Tag(s)</th>
                            <th>Likes Count</th>
                            <th>Publication Date</th>
                            <th>Creation Date</th>
                            <th>Editor’s Choice</th>
                            <th>Hot News</th>
                            <th>Status</th>
                            @canany([config('permissions_list.ARTICLE_UPDATE'), config('permissions_list.ARTICLE_DESTROY')])
                                <th>Actions</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $article->image->file_path) }}" alt="{{ $article->image->alt_text }}" width="100px" style="max-height: 90px">
                                </td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->slug }}</td>
                                <td>{{ $article->user->full_name }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td class="nowrap">{{ str(nullable_value($article->tagNames()))->limit(50) }}</td>
                                <td>{{ $article->likeCount }}</td>
                                <td class=" text-left nowrap">{{ \Carbon\Carbon::parse($article->published_at)->format(config('common.datetime_format')) }}</td>
<td class=" text-left nowrap">{{ \Carbon\Carbon::parse($article->created_at)->format(config('common.datetime_format')) }}</td>

                                <td class="{{ status_class($article->editor_choice) }}">{{ status_message($article->editor_choice) }}</td>
                                <td class="{{ status_class($article->isHot()) }}">{{ status_message($article->isHot()) }}</td>
                                <td class="{{ status_class($article->status) }}">{{ status_message($article->status) }}</td>
                                @canany([
                                    config('permissions_list.ARTICLE_UPDATE'),
                                    config('permissions_list.ARTICLE_DESTROY'),
                                    config('permissions_list.SEO_MANAGEMENT', false)
                                ])
                                    <td>
                                        <div class="d-flex gap-2">
                                            @can(config('permissions_list.ARTICLE_UPDATE', false))
                                                <a class="btn btn-sm btn-info btn-icon round d-flex justify-content-center align-items-center"
                                                   rel="tooltip" aria-label="Edit" data-bs-original-title="Edit"
                                                   href="{{ route(config('app.panel_prefix', 'panel') . '.articles.edit', $article->id) }}">
                                                    <i class="icon-pencil en-flip-horizontal"></i>
                                                </a>
                                            @endcan

                                            @can(config('permissions_list.ARTICLE_DESTROY', false))
                                                <x-common-delete-button :route="route(config('app.panel_prefix', 'panel') . '.articles.destroy', $article->id)"/>
                                            @endcan

                                            @can(config('permissions_list.SEO_MANAGEMENT', false))
                                                <x-seo-manager-seo-settings-button :route="route(config('app.panel_prefix', 'panel') . '.articles.seo-settings', $article->id)"/>
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
