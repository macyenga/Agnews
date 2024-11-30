@extends('auth::layouts.master', ['title' => 'Update Password'])

@section('content')
    <p class="text-center m-t-30 m-b-40">
        <i class="icon-lock border img-circle font-xxxlg p-20"></i>
    </p>
    <h2 class="text-center">Update Password</h2>
    <div class="alert alert-info text-center m-t-10 m-b-20">
        <i class="icon-comments"></i>
        Please enter your new password.
    </div>

    <x-common-error-messages/>

    <hr>

    <form id="form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <div class="form-group">
            <label class="sr-only control-label" for="password">Password</label>
            <div class="input-group round">
                <span class="input-group-addon">
                    <i class="icon-key"></i>
                </span>
                <input type="password" class="form-control round  text-left" id="password" name="password"
                       required minlength="8">
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group">
            <label class="sr-only control-label" for="password_confirmation">Confirm Password</label>
            <div class="input-group round">
                <span class="input-group-addon">
                    <i class="icon-key"></i>
                </span>
                <input type="password" class="form-control round  text-left" id="password_confirmation" name="password_confirmation"
                       required minlength="8">
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block m-t-20">
                <i class="icon-check font-lg"></i>
                Update Password
            </button>
        </div><!-- /.form-group -->
    </form>

    <hr class="m-b-30">
    <a href="{{ route('password.email') }}" class="btn btn-default btn-block m-b-10">
        <i class="icon-refresh font-lg"></i>
        Resend Password Recovery Email
    </a>
    <a href="{{ route('login') }}" class="btn btn-default btn-block m-b-10">
        <i class="icon-user-following font-lg"></i>
        Login Page
    </a>
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

        $("#form").validate();
    </script>
@endpush
