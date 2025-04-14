<div class="form-group mb-3">
    <label for="{{ $name }}" class="mb-2">
        {{ $label }}
        @if ($required)
            <span class="text-danger small">*</span>
        @endif
    </label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror {{ $class }}" value="{{ $value ?? old($name) }}"
        placeholder="{{ $placeholder }}" @if ($required) required @endif>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
