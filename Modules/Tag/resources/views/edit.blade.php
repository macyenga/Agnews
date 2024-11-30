@extends('panel::layouts.master', ['title' => 'Edit Tag'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.tags.index') }}">Tag List</a></li>
        <li><a>Edit Tag</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user-follow"></i>
                            Edit Tag
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">
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
                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.tags.update', $tag->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="name">Name <small>(Required)</small></label>
                                <input id="name" class="form-control" name="name" type="text" required value="{{ old('name', $tag->name) }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="slug">Slug <small>(Required)</small></label>
                                <input id="slug" class="form-control" name="slug" type="text" required value="{{ old('slug', $tag->slug) }}">
                            </div>
                            <div class="col-12 row form-group justify-content-center">
                                <div class="col-md-6 row">
                                    @can(config('permissions_list.TAG_HOTNESS', false))
                                        <div class="text-center col-6">
                                            <input id="hotness" class="form-control" name="hotness" type="checkbox" @if(old('hotness') || (!old('name') && $tag->isHot()) ) checked @endif>
                                            <label for="hotness">Hot Topic</label>
                                        </div>
                                    @endcan
                                    <div class="text-center col-6">
                                        <input id="status" class="form-control" name="status" type="checkbox" @if(old('status') || (!old('name') && $tag->status) ) checked @endif>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Edit Tag
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
