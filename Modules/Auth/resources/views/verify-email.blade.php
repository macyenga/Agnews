@extends('auth::layouts.master', ['title' => 'Email Verification'])

@section('content')
    <p class="text-center m-t-30 m-b-40">
        <i class="icon-check border img-circle font-xxxlg p-20"></i>
    </p>
    <h2 class="text-center m-b-20">Email Verification</h2>

    @if(session()->has('success'))
        <div class="alert alert-success m-t-10 m-b-20">
            <i class="icon-check"></i>
            {{ session()->get('success') }}
        </div>
    @endif

    <hr>

    <form id="form" class="m-t-30 m-b-30" action="{{ route('verification.send') }}" method="POST" role="form">
        @csrf

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-block m-t-20">
                <i class="icon-envelope-letter"></i>
                Send Email Verification Link
            </button>
        </div><!-- /.form-group -->
    </form>

    <hr class="m-b-30">
    <a href="{{ route('home.index') }}" class="btn btn-info btn-block m-b-10">
        <i class="icon-home"></i>
        Return Home
    </a>

@endsection

@push('scripts')
    <!-- PAGE JAVASCRIPT -->
    <script src="{{ asset('admin/assets/js/pages/login.js') }}"></script>
    <!-- END PAGE JAVASCRIPT -->
@endpush
