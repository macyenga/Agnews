@extends('panel::layouts.master', ['title' => 'Create New User'])

@section('content')
    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.users.index') }}">User List</a></li>
        <li><a>Create New User</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-user-follow"></i>
                            Create New User
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
                    <form id="main-form" role="form" action="{{ route(config('app.panel_prefix', 'panel') . '.users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-common-error-messages/>

                        <fieldset class="row justify-content-center">
                            <div class="form-group col-lg-6">
                                <label for="full_name">Full Name <small>(Required)</small></label>
                                <input id="full_name" class="form-control" name="full_name" type="text" required value="{{ old('full_name') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="username">Username <small>(Required)</small></label>
                                <input id="username" class="form-control" name="username" type="text" required value="{{ old('username') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">Email <small>(Required)</small></label>
                                <input id="email" class="form-control" name="email" type="email" required value="{{ old('email') }}">
                            </div>
                            <div class="form-group relative col-lg-6">
                                <label>User Picture <small>(Required)</small></label>
                                <div class="input-group round">
                                    <input type="text" class="form-control file-input" placeholder="Click to upload">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-success">
                                            <i class="icon-picture"></i>
                                            Upload Picture</button>
                                    </span>
                                </div><!-- /.input-group -->
                                <input type="file" class="form-control" name="picture" required>
                                <div class="help-block"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password">Password <small>(Required, at least 8 characters)</small></label>
                                <input id="password" class="form-control" name="password" minlength="8" type="password" required value="{{ old('password') }}">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="password_confirmation">Confirm Password <small>(Required, at least 8 characters)</small></label>
                                <input id="password_confirmation" class="form-control" name="password_confirmation" minlength="8" type="password" required
                                       value="{{ old('password_confirmation') }}">
                            </div>
                            <div class="form-group col-12 row justify-content-center">
                                <div class="col-md-6">
                                    <label for="bio">Short Description About User</label>
                                    <textarea class="form-control" name="bio" id="bio">{{ old('bio') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-12 row justify-content-center">
                                <div class="row justify-content-center col-6 row">
                                    <div class="text-center col-6">
                                        <input id="email_verification" class="form-control" name="email_verification" type="checkbox"
                                               @if(old('email_verification')) checked @endif>
                                        <label for="email_verification">Email Verification</label>
                                    </div>
                                    <div class="text-center col-6">
                                        <input id="status" class="form-control" name="status" type="checkbox"
                                               @if(old('status')) checked @endif>
                                        <label for="status">Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-4 mx-auto">
                                    <button class="btn btn-success btn-block">
                                        <i class="icon-check"></i>
                                        Create New User
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
        $("#main-form").validate({
            rules: {
                password_confirmation: {
                    equalTo: "#password"
                }
            },
            messages: {
                password_confirmation: {
                    equalTo: "رمزهای عبور یکسان نیستند"
                }
            }
        });
    </script>
@endpush
