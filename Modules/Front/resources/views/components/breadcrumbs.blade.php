<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            <ol class="breadcrumb">
    @if(!$noprefix)
        <li><a href="{{ route('home.index') }}">Home</a></li>
    @endif
    {{ $slot }}
</ol>

            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</div><!-- Page title end -->
