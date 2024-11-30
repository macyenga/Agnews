@extends('panel::layouts.master', ['title' => 'User Dashboard'])

@section('content')
    <x-common-breadcrumbs :noprefix="true">
        <li><a>Dashboard</a></li>
    </x-common-breadcrumbs>

    {{-- Header Stats --}}
    @include('panel::content-sections/header-stats')

    <div class="row m-0 p-0">
        {{-- Site Visitors --}}
        @include('panel::content-sections.site-visitors')

        {{-- Articles Visits --}}
        @include('panel::content-sections.articles-visits')

        {{-- Articles --}}
        @include('panel::content-sections/articles')

        {{-- Categories --}}
        @include('panel::content-sections/categories')

        {{-- Tags --}}
        @include('panel::content-sections/tags')

        {{-- Images --}}
        @include('panel::content-sections/images')

        {{-- Comments --}}
        @include('panel::content-sections/comments')
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('admin/assets/plugins/jquery-incremental-counter/jquery.incremental-counter.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/morris.js/morris.min.js') }}"></script>
    <script>
        $(".counter-down").incrementalCounter({digits: 'auto'});
    </script>
    <script>
        Morris.Donut({
            element: 'site-visits-yearly',
            data: [
                {value: {{ $visitsCount['yearly'] }}, label: 'Year', formatted: '{{ $visitsCount['yearly'] }} visits'},
                {value: {{ $visitsCount['monthly'] }}, label: 'Month', formatted: '{{ $visitsCount['monthly'] }} visits'},
                {value: {{ $visitsCount['weekly'] }}, label: 'Week', formatted: '{{ $visitsCount['weekly'] }} visits'},
            ],
            colors: [
                '#1e4572',
                '#597bbd',
                '#6da1f1',
            ],
            formatter: function (x, data) {
                return data.formatted;
            },
            resize: true
        });

        Morris.Donut({
            element: 'site-visits-daily',
            data: [
                {value: {{ $visitsCount['daily'] }}, label: 'Day', formatted: '{{ $visitsCount['daily'] }} visits'},
                {value: {{ $visitsCount['ten_hours'] }}, label: '10 Hours', formatted: '{{ $visitsCount['ten_hours'] }} visits'},
                {value: {{ $visitsCount['hourly'] }}, label: '1 Hour', formatted: '{{ $visitsCount['hourly'] }} visits'},
            ],
            colors: [
                '#ffc107',
                '#e36100',
                '#d50000',
            ],
            formatter: function (x, data) {
                return data.formatted;
            },
            resize: true
        });
    </script>
    <script>
        Morris.Donut({
            element: 'articles-visits-yearly',
            data: [
                {value: {{ $articlesVisitsCount['year'] }}, label: 'Year', formatted: '{{ $articlesVisitsCount['year'] }} visits'},
                {value: {{ $articlesVisitsCount['month'] }}, label: 'Month', formatted: '{{ $articlesVisitsCount['month'] }} visits'},
                {value: {{ $articlesVisitsCount['week'] }}, label: 'Week', formatted: '{{ $articlesVisitsCount['week'] }} visits'},
            ],
            colors: [
                '#1e4572',
                '#597bbd',
                '#6da1f1',
            ],
            formatter: function (x, data) {
                return data.formatted;
            },
            resize: true
        });

        Morris.Donut({
            element: 'articles-visits-daily',
            data: [
                {value: {{ $articlesVisitsCount['day'] }}, label: 'Day', formatted: '{{ $articlesVisitsCount['day'] }} visits'},
                {value: {{ $articlesVisitsCount['10hours'] }}, label: '10 Hours', formatted: '{{ $articlesVisitsCount['10hours'] }} visits'},
                {value: {{ $articlesVisitsCount['hour'] }}, label: '1 Hour', formatted: '{{ $articlesVisitsCount['hour'] }} visits'},
            ],
            colors: [
                '#ffc107',
                '#e36100',
                '#d50000',
            ],
            formatter: function (x, data) {
                return data.formatted;
            },
            resize: true
        });
    </script>
@endpush
