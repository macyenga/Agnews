@extends('panel::layouts.master', ['title' => 'View Message'])

@section('content')

    <x-common-breadcrumbs>
        <li><a href="{{ route(config('app.panel_prefix', 'panel') . '.contact-us.messages.index') }}">User Messages List</a></li>
        <li><a>View Message</a></li>
    </x-common-breadcrumbs>

    <div class="row pe-0">
        <div class="col-12 pe-0">
            <div class="portlet box shadow min-height-500">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">
                            <i class="icon-envelope-open"></i>
                            View Message
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box ">
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
                <div class="portlet-body row">
                    <h2 class="col-12 message-column">
                        <span>Subject:</span>
                        <span>{{ $userMessage->subject }}</span>
                    </h2>
                    <div class="col-md-4 message-column">
                        <span>Name:</span>
                        <span>{{ $userMessage->name }}</span>
                    </div>
                    <div class="col-md-4 message-column">
                        <span>Email:</span>
                        <span>{{ $userMessage->email }}</span>
                    </div>
                    <div class="col-md-4 message-column">
                        <span>Phone Number:</span>
                        <span>{{ nullable_value($userMessage->phone) }}</span>
                    </div>
                    <div class="col-12 message-column">
                        <p>Message:</p>
                        <p>{{ $userMessage->message }}</p>
                    </div>
                </div><!-- /.portlet -->
            </div>
        </div>

@endsection

@push('styles')
    <style>
        .message-column {
            margin-bottom: 2rem;
            text-align: center;
        }
    </style>
@endpush
