<div class="section-header">
    <h1>{{ $title }}</h1>
    <div class="section-header-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            <div class="breadcrumb-item">
                @if (isset($breadcrumb['url']))
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                @else
                    {{ $breadcrumb['label'] }}
                @endif
            </div>
        @endforeach
        @if ($active)
            <div class="breadcrumb-item active">{{ $active }}</div>
        @endif
    </div>
</div>
