@extends('panel::layouts.master', ['title' => 'Change Email'])

@section('content')
    <x-common-breadcrumbs>
        <li><a>Profile</a></li>
        <li><a>Change Email</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="far en-pen-to-square"></i>
                            Change Email
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
                    @if(session()->has('success'))
                        <div class="alert alert-success m-t-10 m-b-20">
                            <i class="icon-check"></i>
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.profile.email.change') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" name="email" type="email" required value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Change Email
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
