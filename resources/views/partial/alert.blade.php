<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>