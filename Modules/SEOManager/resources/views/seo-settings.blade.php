@extends('panel::layouts.master', ['title' => 'SEO Settings' . (' ' . $pageTitle ?? null)])

@section('content')
    <x-common-breadcrumbs>
        <li><a>{{ $pageTitle ?? null }}</a></li>
        <li><a>SEO Settings</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="fab en-searchengin"></i>
                            SEO Settings {{ $pageTitle ?? null }}
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
                    @if(session()->has('success'))
                        <div class="alert alert-success m-t-10 m-b-20">
                            <i class="icon-check"></i>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.seo-settings.adjust') }}" method="post">
                        @csrf
                        @method('PUT')
                        <x-common-error-messages/>

                        <!-- Hidden input for model type and ID -->
                        <input type="hidden" name="model_type" value="{{ get_class($model) }}">
                        <input type="hidden" name="model_id" value="{{ $model->id }}">

                        <input type="hidden" name="next_url" value="{{ $nextUrl }}">

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="meta_title">
                                    <span>Meta Title</span>
                                    <span>(Suggestion: {{ $title }})</span>
                                </label>
                                <input id="meta_title" class="form-control" name="meta_title" type="text" value="{{ old('meta_title', $model->seoSetting?->meta_title) }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="meta_author">Meta Author</label>
                                <input id="meta_author" class="form-control" name="meta_author" type="text" value="{{ old('meta_author', $model->seoSetting?->meta_author) }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" class="form-control" name="meta_description">{{ old('meta_description', $model->seoSetting?->meta_description) }}</textarea>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea id="meta_keywords" class="form-control" name="meta_keywords">{{ old('meta_keywords', $model->seoSetting?->meta_keywords) }}</textarea>
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="canonical_url">
                                    <span>Canonical URL</span>
                                    <span class="d-block d-lg-inline suggest-default-value">(Suggestion: {{ $canonicalUrl }})</span>
                                </label>
                                <input id="canonical_url" class="form-control" name="canonical_url" dir="auto"
                                       value="{{ old('canonical_url', $model->seoSetting?->canonical_url) }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label for="robots">
                                    <span>Robots</span>
                                    <span>(Suggestion: index, follow)</span>
                                </label>
                                <input id="robots" class="form-control" name="robots" type="text" dir="auto" value="{{ old('robots', $model->seoSetting?->robots) }}">
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Save SEO Settings
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
