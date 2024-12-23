@extends('panel::layouts.master', ['title' => 'Create New Ad'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.ads.index') }}">Ads List</a></li>
        <li><a>Create New Ad</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="fas fa-bullhorn"></i>
                            Create New Ad
                        </h3>
                    </div>
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Fullscreen" data-bs-original-title="Fullscreen">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.ads.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <!-- Title Field -->
                            <div class="form-group col-lg-6">
                                <label for="title">Title <small>(Required)</small></label>
                                <input id="title" class="form-control" name="title" type="text" required value="{{ old('title') }}">
                            </div>

                            <!-- Link Field -->
                            <div class="form-group col-lg-6">
                                <label for="link">Link <small>(Required)</small></label>
                                <input id="link" class="form-control" name="link" type="text" required value="{{ old('link') }}">
                            </div>

                            <!-- Publish Date Field -->
                            <div class="form-group col-lg-6">
                                <label for="published_at">Publish Date <small>(Required)</small></label>
                                <input id="published_at" name="published_at" type="text" class="form-control cursor-pointer" required value="{{ old('published_at') }}" placeholder="YYYY-MM-DD HH:MM">
                            </div>

                            <!-- Expiration Date Field -->
                            <div class="form-group col-lg-6">
                                <label for="expired_at">Expiration Date</label>
                                <input id="expired_at" name="expired_at" type="text" class="form-control cursor-pointer" value="{{ old('expired_at') }}" placeholder="YYYY-MM-DD HH:MM">
                            </div>

                            <!-- Location Field -->
                            <div class="form-group col-lg-6">
                                <label for="section">Placement</label>
                                <select id="section" class="form-control select2" name="section">
                                    <option value="">Select Placement</option>
                                    @foreach($sections as $key => $sectionName)
                                        <option value="{{ $key }}" @if(old('section') === (string) $key) selected @endif>{{ __($sectionName) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Image Upload Field -->
                            <div class="form-group relative col-lg-6">
                                <label>Image <small>(Required)</small></label>
                                <div class="input-group round">
                                    <input type="text" class="form-control file-input" placeholder="Click to upload">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success">
                                            <i class="icon-picture"></i>
                                            Upload Image
                                        </button>
                                    </span>
                                </div>
                                <input type="file" class="form-control" name="image" required>
                            </div>

                            <!-- Status Field -->
                            <div class="col-12 form-group text-center">
                                <input id="status" class="form-control" name="status" type="checkbox" @if(old('status')) checked @endif>
                                <label for="status">Status</label>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Create New Ad
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
    <!-- Flatpickr (for datetime picker) -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr("#published_at", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: "{{ old('published_at') }}"
            });
            flatpickr("#expired_at", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                defaultDate: "{{ old('expired_at') }}"
            });
        });
    </script>
@endpush

@push('styles')
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush
