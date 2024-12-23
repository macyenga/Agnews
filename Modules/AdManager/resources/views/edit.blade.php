@extends('panel::layouts.master', ['title' => 'Hindura Itangazo'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.ads.index') }}">Urutonde rw\'Amatangazo</a></li>
        <li><a>Hindura Itangazo</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="fas fa-bullhorn"></i>
                            Hindura Itangazo
                        </h3>
                    </div>
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip"
                           aria-label="Erekana Byose" data-bs-original-title="Erekana Byose">
                            <i class="icon-size-fullscreen d-flex justify-content-center align-items-center"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.ads.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="title">Umutwe <small>(Birakenewe)</small></label>
                                <input id="title" class="form-control" name="title" type="text" required value="{{ old('title', $ad->title) }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="link">Link <small>(Birakenewe)</small></label>
                                <input id="link" class="form-control" name="link" type="text" required value="{{ old('link', $ad->link) }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="published_at">Itariki Yatangajwe <small>(Birakenewe)</small></label>
                                <div class="input-group" id="dtp1">
                                    <input id="published_at" type="text" class="form-control cursor-pointer" required readonly data-name="dtp1-text" dir="ltr">
                                    <i class="icon-clock fs-5 input-group-text cursor-pointer"></i>
                                </div>
                                <input name="published_at" type="hidden" data-name="dtp1-date">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="expired_at">Itariki Izarangiriraho </label>
                                <div class="input-group" id="dtp2">
                                    <button id="clear-expiry-date" class="btn btn-danger" type="button" title="Siba Itariki Yo Kuriha">
                                        <i class="icon-close"></i>
                                    </button>
                                    <input id="expired_at" type="text" class="form-control cursor-pointer" readonly data-name="dtp2-text" dir="ltr">
                                    <i class="icon-clock fs-5 input-group-text cursor-pointer"></i>
                                </div>
                                <input name="expired_at" type="hidden" data-name="dtp2-date">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="section">Ahantu Hazashyirwa</label>
                                <select id="section" class="form-control select2" name="section">
                                    <option value="">Hitamo Ahazashyirwa</option>
                                    @foreach($sections as $key => $sectionName)
                                        <option value="{{ $key }}" @if((string) old('section', $ad->section) === (string) $key) selected @endif>{{ __($sectionName) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 d-flex flex-column align-items-center">
                                <div class="form-group relative col-lg-6">
                                    <label>Isura</label>
                                    <div class="input-group round">
                                        <input type="text" class="form-control file-input" placeholder="Kanda Hano Guhitamo Isura">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-success">
                                                <i class="icon-picture"></i>
                                                Ohereza Isura
                                            </button>
                                        </span>
                                    </div>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group col-12 text-center">
                                    <img class="mb-2" src="{{ asset('storage/' . $ad->image->file_path) }}" alt="{{ $ad->image->alt_text }}" style="max-width: 300px; max-height: 300px">
                                </div>
                            </div>
                            <div class="col-12 form-group text-center">
                                <input id="status" class="form-control" name="status" type="checkbox" @if( old('status') || (!old('title') && $ad->status) ) checked @endif>
                                <label for="status">Imiterere</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Hindura Itangazo
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
    <script src="{{ asset('admin/assets/plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/select2.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $("#published_at, #expired_at").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true
        });

        document.getElementById('clear-expiry-date').addEventListener('click', function () {
            $('#expired_at').datepicker('setDate', null);
            document.querySelector('[data-name="dtp2-date"]').value = '';
        });

        $("#main-form").validate();
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/jquery-ui/jquery-ui.min.css') }}">
@endpush
