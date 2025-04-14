<div class="form-group mb-3">
    <label for="{{ $name }}" class="mb-2">
        {{ $label }}
        @if ($required)
            <span class="text-danger small">*</span>
        @endif
    </label>
    <select name="{{ $name }}{{ $multiple ? '[]' : '' }}" id="{{ $name }}"
        {{ $multiple ? 'multiple' : '' }} class="form-control @error($name) is-invalid @enderror {{ $class }}"
        @if ($required) required @endif>

        @if (!$multiple)
            <option value="" {{ old($name, $selected) == '' ? 'selected' : '' }}>Pilih {{ $label }}</option>
        @endif

        @foreach ($options as $key => $option)
            @if ($multiple)
                <option value="{{ $key }}"
                    {{ in_array((string) $key, array_map('strval', (array) old($name, (array) $selected))) ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @else
                <option value="{{ $key }}"
                    {{ (string) old($name, $selected) === (string) $key ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endif
        @endforeach


    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/modules/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('#roles').select2({})
        })
    </script>
@endpush
