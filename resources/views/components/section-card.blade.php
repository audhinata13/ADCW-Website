<div class="card">
    @if (isset($header))
        <div class="card-header d-flex justify-content-between">
            {{ $header }}
        </div>
    @endif

    @if (isset($body))
        <div class="card-body">
            {{ $body }}
        </div>
    @endif
</div>
