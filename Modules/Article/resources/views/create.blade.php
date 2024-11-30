@extends('panel::layouts.master', ['title' => 'Create New Article'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.articles.index') }}">Article List</a></li>
        <li><a>Create New Article</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user-follow"></i>
                            Create New Article
                        </h3>
                    </div>
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Full Screen" data-bs-original-title="Full Screen">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.articles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="title">Title <small>(Required)</small></label>
                                <input id="title" class="form-control" name="title" type="text" required value="{{ old('title') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="slug">Slug <small>(Required)</small></label>
                                <input id="slug" class="form-control" name="slug" type="text" required value="{{ old('slug') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="published_at">Publication Date <small>(Required)</small></label>
                                <input id="published_at" type="text" class="form-control" name="published_at" required value="{{ old('published_at') }}">
                            </div>
                            <div class="form-group relative col-lg-6">
                                <label>Featured Image <small>(Required)</small></label>
                                <div class="input-group round">
                                    <input type="text" class="form-control file-input" placeholder="Click to upload">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success">
                                            <i class="icon-picture"></i>
                                            Upload Image</button>
                                    </span>
                                </div>
                                <input type="file" class="form-control" name="image" required>
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category_id">Category <small>(Required)</small></label>
                                <select id="category_id" class="form-control select2" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="type">Content Type <small>(Required)</small></label>
                                <select id="type" class="form-control select2" name="type">
                                    <option value="">Select Content Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" @if(old('type') === $type) selected @endif>{{ __('article::types.' . $type) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 d-flex justify-content-center">
                                <div class="col-12 col-md-6">
                                    <label for="tag_ids">Tags</label>
                                    <select id="tag_ids" class="form-control select2" name="tag_ids[]" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tag_ids', []))) selected @endif>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label for="tinymce-editor">Article Body <small>(Required)</small></label>
                                <textarea id="tinymce-editor" name="body" required>{{ old('body') }}</textarea>
                            </div>
                            <div class="col-12 col-md-6 row form-group justify-content-center">
                                @can(config('permissions_list.ARTICLE_EDITOR_CHOICE', false))
                                    <div class="text-center col-4">
                                        <input id="editor_choice" class="form-control" name="editor_choice" type="checkbox" @if(old('editor_choice')) checked @endif>
                                        <label for="editor_choice">Editor Choice</label>
                                    </div>
                                @endcanany
                                @can(config('permissions_list.ARTICLE_HOTNESS', false))
                                    <div class="text-center col-4">
                                        <input id="hotness" class="form-control" name="hotness" type="checkbox" @if(old('hotness')) checked @endif>
                                        <label for="hotness">Hot News</label>
                                    </div>
                                @endcanany
                                <div class="text-center col-4">
                                    <input id="status" class="form-control" name="status" type="checkbox" @if(old('status')) checked @endif>
                                    <label for="status">Publication Status</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Create New Article
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize flatpickr
        flatpickr("#published_at", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            // If you want to set the initial value if the form is being edited
            defaultDate: "{{ old('published_at') }}",
        });

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
            },
        });
        $("#main-form").validate();
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tinymce.css') }}">
@endpush
