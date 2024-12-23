@extends('auth::layouts.master', ['title' => 'Register'])

@section('content')
    <p class="text-center m-t-30 m-b-40">
        <i class="icon-user-follow border img-circle font-xxxlg p-20"></i>
    </p>
    <h2 class="text-center m-b-20">Register</h2>

    <x-common-error-messages/>

    <hr>

    <form id="advanced-form" method="post" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label class="sr-only control-label" for="username">Name</label>
            <div class="input-group round">
                <span class="input-group-addon">
                    <i class="icon-user"></i>
                </span>
                <input type="text" class="form-control round" id="full_name" name="full_name" value="{{ old('full_name') }}">
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group">
            <label class="sr-only control-label" for="email">Email</label>
            <div class="input-group round">
                <span class="input-group-addon">
                    <i class="icon-envelope"></i>
                </span>
                <input type="text" class="form-control round  text-left" id="email" name="email"
                       placeholder="info@site.com" value="{{ old('email') }}">
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group">
            <label class="sr-only control-label" for="password">Password</label>
            <div class="input-group round">
                <span class="input-group-addon">
                    <i class="icon-key"></i>
                </span>
                <input type="password" class="form-control round ltr text-left" id="password" name="password"
                       minlength="8">
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group">
            <label class="sr-only control-label" for="confirm_password">Confirm Password</label>
            <div class="input-group round">
                <span class="input-group-addon">
                    <i class="icon-key"></i>
                </span>
                <input type="password" class="form-control round ltr text-left" id="password_confirmation"
                       name="password_confirmation" minlength="8">
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group mt-2">
            <div class="input-group round">
                <div class="checkbox">
                    <label class="cursor-pointer" id="agree-label">
                        <input type="checkbox" id="agree" name="agree" @if(old('agree')) checked @endif>
                        I accept the site’s terms and conditions
                    </label>
                </div><!-- /.checkbox -->
            </div><!-- /.input-group-->
        </div><!-- /.form-group -->
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block">
                <i class="icon-check"></i>
                Register
            </button>
        </div><!-- /.form-group -->
    </form>

    <hr class="m-b-30">
    <a href="{{ route('password.request') }}" class="btn btn-default btn-block m-b-10">
        <i class="icon-refresh font-lg"></i>
        Forgot Password
    </a>
    <a href="{{ route('login') }}" class="btn btn-default btn-block">
        <i class="icon-user-following font-lg"></i>
        Already registered? Log In!
    </a>
@endsection

@push('scripts')
    <!-- PAGE JAVASCRIPT -->
    <script src="{{ asset('admin/assets/js/pages/register.js') }}"></script>
    <!-- END PAGE JAVASCRIPT -->
@endpush
