@extends('panel::layouts.master', ['title' => 'Edit Video'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.videos.index') }}">Video List</a></li>
        <li><a>Edit Video</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-film"></i>
                            Edit Video
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Full Screen" data-bs-original-title="Full Screen">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
                        </a>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.videos.update', $video->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="col-12 row form-group justify-content-center">
                                <div class="form-group relative col-lg-6">
                                    <input type="file" class="form-control" name="video" accept="video/*">
                                    <label>Video</label>
                                    <div class="input-group round">
                                        <input type="text" class="form-control file-input" placeholder="Click to upload" readonly>
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-success">
                                            <i class="icon-film"></i>
                                            Upload Video</button>
                                    </span>
                                    </div><!-- /.input-group -->
                                    <div class="help-block"></div>
                                </div>
                                <div class="col-12 text-center">
                                    <video controls class="mb-2" itemscope itemtype="https://schema.org/VideoObject" style="max-width: 300px; max-height: 300px">
                                        <source src="{{ $video->getFirstMediaUrl('videos') }}" type="{{ $video->getFirstMedia('videos')->mime_type }}">
                                        <meta itemprop="name" content="{{ $video->name }}">
                                        <meta itemprop="description" content="{{ $video->name }}">
                                        <meta itemprop="duration" content="{{ $video->duration }}">
                                        <meta itemprop="thumbnail" content="{{ $video->thumbnail_url }}">
                                    </video>
                                    <div>
                                        {{ $video->getFirstMediaUrl('videos') }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 row form-group justify-content-center">
                                <div class="relative col-lg-6 form-group">
                                    <input type="file" class="form-control" name="thumbnail">
                                    <label>Thumbnail Image</label>
                                    <div class="input-group round">
                                        <input type="text" class="form-control file-input" placeholder="Click to upload">
                                        <span class="input-group-btn">
                                        <button type="button" class="btn btn-success">
                                            <i class="icon-picture"></i>
                                            Upload Image</button>
                                    </span>
                                    </div><!-- /.input-group -->
                                    <div class="help-block"></div>
                                </div>
                                @if($video->thumbnail_url)
                                    <div class="form-group col-12 text-center">
                                        <img class="mb-2" src="{{ $video->thumbnail_url }}" alt="Thumbnail Image" style="max-width: 300px; max-height: 300px">
                                        <div>
                                            {{ $video->thumbnail_url }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Edit Video
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $.validator.setDefaults({
            highlight: function (element) {
                $(element).closest('.form-group').addClass('has-error').removeClass("has-success");
            },
            unhighlight: function (element) {
                $(element).closest('.form-group').removeClass('has-error').addClass("has-success");
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $("#main-form").validate();
    </script>
@endpush
