@extends('panel::layouts.master', ['title' => 'Image List'])

@section('content')

    <x-common-breadcrumbs>
        <li><a>Image List</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title d-flex gap-3">
                        <h3 class="title m-0">
                            <i class="icon-people"></i>
                            Image List
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
                        {{--                        @can('store', $imageClassName)--}}
                        {{--                            <a class="btn btn-sm btn-default btn-round bg-green text-white" rel="tooltip"--}}
                        {{--                               href="{{ route(config('app.panel_prefix', 'panel') . '.images.create') }}"--}}
                        {{--                               aria-label="Create New Image" data-bs-original-title="Create New Image">--}}
                        {{--                                <i class="icon-plus d-flex justify-content-center align-items-center"></i>--}}
                        {{--                                <div class="paper-ripple">--}}
                        {{--                                    <div class="paper-ripple__background"></div>--}}
                        {{--                                    <div class="paper-ripple__waves"></div>--}}
                        {{--                                </div>--}}
                        {{--                            </a>--}}
                        {{--                        @endcan--}}

                        <!-- Filter box -->
                        <div class="btn-group" rel="tooltip"
                             aria-label="Filter Images" data-bs-original-title="Filter Images">
                            <button type="button" class="btn btn-sm btn-default btn-round btn-info text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                                <i class=" fas en-filter d-flex justify-content-center align-items-center"></i>
                                <div class="paper-ripple">
                                    <div class="paper-ripple__background"></div>
                                    <div class="paper-ripple__waves"></div>
                                </div>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach($filters as $key => $value)
                                    <li><a class="dropdown-item"
                                           href="{{ route(
                                                                config('app.panel_prefix', 'panel') . '.images.index',
                                                                ['filter' => $key] + request()->all()
                                                       ) }}">{{ $value }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <div class="table-responsive" style="overflow-x: auto !important;">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Image Path</th>
                                <th>Alt Text</th>
                                <th>Uploader</th>
                                <th>Creation Date</th>
                                @can('operations', $imageClassName)
                                    <th>Actions</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                @can('show', $image)
                                    <tr>
                                        <td>{{ $image->id }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->alt_text }}" width="100px" style="max-height: 90px">
                                        </td>
                                        <td>{{ $image->file_path }}</td>
                                        <td>{{ nullable_value($image->alt_text) }}</td>
                                        <td>{{ $image->user_full_name }}</td>
                                        <td class=" text-left nowrap">{{ \Carbon\Carbon::parse($image->created_at)->format(config('common.datetime_format')) }}</td>
                                        @can('operations', $imageClassName)
                                            <td>
                                                <div class="d-flex gap-2">
                                                    @can('update', $image)
                                                        <a class="btn btn-sm btn-info btn-icon round d-flex justify-content-center align-items-center"
                                                           rel="tooltip" aria-label="Edit" data-bs-original-title="Edit"
                                                           href="{{ route(config('app.panel_prefix', 'panel') . '.images.edit', $image->id) }}">
                                                            <i class="icon-pencil en-flip-horizontal"></i>
                                                        </a>
                                                    @endcan

                                                    @can('destroy', $image)
                                                        <x-common-delete-button :route="route(config('app.panel_prefix', 'panel') . '.images.destroy', $image->id)"/>
                                                    @endcan
                                                </div>
                                            </td>
                                        @endcan
                                    </tr>
                                @endcan
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Display pagination links -->
                    {{ $images->links() }}

                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>

@endsection
