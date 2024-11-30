@extends('panel::layouts.master', ['title' => 'Video List'])

@section('content')

    <x-common-breadcrumbs>
        <li><a>Video List</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title d-flex gap-3">
                        <h3 class="title m-0">
                            <i class="icon-film"></i>
                            Video List
                        </h3>
                        <form class="d-inline-block search-form">
                            <div class="input-group">
                                <button class="btn btn-secondary d-flex align-items-center" type="submit">
                                    <i class="icon-magnifier"></i>
                                </button>
                                <input name="query" type="text" class="form-control p-2" placeholder="Search..." value="{{ request()->get('query') }}">
                                @foreach(request()->except(['query', 'page']) as $key => $value)
                                    <input name="{{ $key }}" type="hidden" value="{{ $value }}">
                                @endforeach
                            </div>
                        </form>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box ">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Full Screen" data-bs-original-title="Full Screen">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
                        </a>
                        @can('store', $videoClassName)
                            <a class="btn btn-sm btn-default btn-round bg-green text-white" rel="tooltip"
                               href="{{ route(config('app.panel_prefix', 'panel') . '.videos.create') }}"
                               aria-label="Create New Video" data-bs-original-title="Create New Video">
                                <i class="icon-plus d-flex justify-content-center align-items-center"></i>
                                <div class="paper-ripple">
                                    <div class="paper-ripple__background"></div>
                                    <div class="paper-ripple__waves"></div>
                                </div>
                            </a>
                        @endcan

                        <!-- Filter box -->
                        @can('all', $videoClassName)
                            <div class="btn-group" rel="tooltip"
                                 aria-label="Filter Videos" data-bs-original-title="Filter Videos">
                                <button type="button" class="btn btn-sm btn-default btn-round btn-info text-white dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="true">
                                    <i class=" fas en-filter d-flex justify-content-center align-items-center"></i>
                                    <div class="paper-ripple">
                                        <div class="paper-ripple__background"></div>
                                        <div class="paper-ripple__waves"></div>
                                    </div>
                                </button>
                                <ul class="dropdown-menu">
                                    @foreach($videoClassName::filters() as $key => $value)
                                        <li>
                                            <a class="dropdown-item"
                                               href="{{ route( config('app.panel_prefix', 'panel') . '.videos.index',
                                                   ['filter' => $key] + request()->all() ) }}">
                                                {{ $value }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endcan
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <div class="table-responsive" style="overflow-x: auto !important;">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumbnail</th>
                                <th>File Name</th>
                                <th>Duration</th>
                                <th>Size</th>
                                <th>Format</th>
                                <th>Uploader</th>
                                <th>Creation Date</th>
                                {{--@can('operations', $videoClassName)--}}
                                <th>Actions</th>
                                {{--@endcan--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                @can('show', $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>
                                            <img src="{{ $video->getThumbnailUrl() }}" alt="{{ $video->name }}" width="100px" style="max-height: 90px">
                                        </td>
                                        <td>{{ $video->name }}</td>
                                        <td>{{ $video->duration }}</td>
                                        <td class="">{{ $video->video_size }}</td>
                                        <td>{{ $video->video_type }}</td>
                                        <td>{{ $video->user_full_name }}</td>
                                        <td class=" text-left nowrap">{{ \Carbon\Carbon::parse($video->created_at)->format(config('common.datetime_format')) }}</td>
                                        {{--@can('operations', $videoClassName)--}}
                                        <td>
                                            <div class="d-flex gap-2">
                                                <x-common-copy-link-button :url="$video->url"/>

                                                @can('update', $video)
                                                    <a class="btn btn-sm btn-info btn-icon round d-flex justify-content-center align-items-center"
                                                       rel="tooltip" aria-label="Edit" data-bs-original-title="Edit"
                                                       href="{{ route(config('app.panel_prefix', 'panel') . '.videos.edit', $video->id) }}">
                                                        <i class="icon-pencil en-flip-horizontal"></i>
                                                    </a>
                                                @endcan

                                                @can('destroy', $video)
                                                    <x-common-delete-button :route="route(config('app.panel_prefix', 'panel') . '.videos.destroy', $video->id)"/>
                                                @endcan

                                                @can('update', $video)
                                                    <div>
                                                        <form action="{{ route(config('app.panel_prefix', 'panel') . '.videos.destroy-thumbnail', $video->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-secondary btn-icon round d-flex justify-content-center align-items-center"
                                                                    rel="tooltip" aria-label="Delete Thumbnail" data-bs-original-title="Delete Thumbnail">
                                                                <i class="fas en-trash-arrow-up en-flip-horizontal"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endcan
                                            </div>
                                        </td>
                                        @endcan
                                    </tr>
                                    {{--@endcan--}}
                                    @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Display pagination links -->
                    {{ $videos->links() }}

                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>

@endsection
