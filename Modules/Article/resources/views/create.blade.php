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
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Fullscreen" data-bs-original-title="Fullscreen">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                        </a>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
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
                                <label for="slug">Slug <small>(Required)</small> </label>
                                <input id="slug" class="form-control" name="slug" type="text" required value="{{ old('slug') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="published_at">Publication Date <small>(Required)</small></label>
                                <input id="published_at" type="datetime-local" class="form-control" name="published_at" required value="{{ old('published_at') }}">
                            </div>
                            <div class="form-group relative col-lg-6">
                                <label>Thumbnail Image <small>(Required)</small></label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="category_id">Category <small>(Required)</small></label>
                                <select id="category_id" class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="type">Content Type <small>(Required)</small></label>
                                <select id="type" class="form-control" name="type">
                                    <option value="">Select Content Type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}" @if(old('type') === $type) selected @endif>{{ __('article::types.' . $type) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="tag_ids">Tags</label>
                                <select id="tag_ids" class="form-control" name="tag_ids[]" multiple>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tag_ids', []))) selected @endif>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="tinymce-editor">Article Content <small>(Required)</small></label>
                                <textarea id="tinymce-editor" name="body" required>{{ old('body') }}</textarea>
                            </div>
                            <div class="col-12 row form-group justify-content-center">
                                <div class="text-center col-4">
                                    <input id="editor_choice" type="checkbox" name="editor_choice" @if(old('editor_choice')) checked @endif>
                                    <label for="editor_choice">Editor's Choice</label>
                                </div>
                                <div class="text-center col-4">
                                    <input id="hotness" type="checkbox" name="hotness" @if(old('hotness')) checked @endif>
                                    <label for="hotness">Hot News</label>
                                </div>
                                <div class="text-center col-4">
                                    <input id="status" type="checkbox" name="status" @if(old('status')) checked @endif>
                                    <label for="status">Publish Status</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mx-auto">
                                    <button class="btn btn-success">
                                        <i class="icon-check"></i>
                                        Create New Article
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
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/dist/css/select2.min.css') }}">
@endpush
