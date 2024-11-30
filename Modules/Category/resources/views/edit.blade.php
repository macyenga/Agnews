@extends('panel::layouts.master', ['title' => 'Edit Category'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.categories.index') }}">Category List</a></li>
        <li><a>Edit Category</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user-follow"></i>
                            Edit Category
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
                    <form id="main-form" role="form"
                          action="{{ route(config('app.panel_prefix', 'panel') . '.categories.update', $category->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="name">Name <small>(Required)</small></label>
                                <input id="name" class="form-control" name="name" type="text" required value="{{ $category->name }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="slug">Slug <small>(Required)</small></label>
                                <input id="slug" class="form-control" name="slug" type="text" required value="{{ $category->slug }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="parent_id">Parent Category</label>
                                <select id="parent_id" class="form-control select2" name="parent_id">
                                    <option value="">Select Parent Category</option>
                                    @foreach($categories as $parentCategory)
                                        <option value="{{ $parentCategory->id }}" @if((int) old('parent_id', $category->parent_id) === $parentCategory->id) selected @endif>
                                            {{ $parentCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 d-flex flex-column align-items-center">
                                <div class="form-group relative col-lg-6">
                                    <label>Thumbnail Image <small>(Required)</small></label>
                                    <div class="input-group round">
                                        <input type="text" class="form-control file-input" placeholder="Click to upload">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success">
                                                <i class="icon-picture"></i>
                                                Upload Image
                                            </button>
                                        </span>
                                    </div>
                                    <input type="file" class="form-control" name="image">
                                    <div class="help-block"></div>
                                </div>
                                <div class="form-group col-12 text-center">
                                    <img class="mb-2" src="{{ asset('storage/' . $category->image->file_path) }}" alt="{{ $category->image->alt_text }}" style="max-width: 300px; max-height: 300px">
                                    <div>
                                        {{ asset('storage/' . $category->image->file_path) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <input id="status" class="form-control" name="status" type="checkbox" @if(old('status') || (!old('name') && $category->status) ) checked @endif>
                                <label for="status">Status</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Edit Category
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
    <script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/select2.js') }}"></script>

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

        $(".select2.curve").select2({
            ltr: true,
            containerCssClass: "curve"
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/dist/css/select2.min.css') }}">
@endpush
