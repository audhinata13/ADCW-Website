<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Create Previous Event'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Previous Events', 'url' => route('previous-events.index')],
        ]" :active="'Create'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Create Previous Event</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('previous-events.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='image' class='mb-2'>Image</label>
                            <input type='file' name='image' id='image'
                                class='form-control @error('image') is-invalid @enderror' value='{{ old('image') }}'>
                            @error('image')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='name' class='mb-2'>Name</label>
                            <input type='text' name='name' id='name'
                                class='form-control @error('name') is-invalid @enderror' value='{{ old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='link_youtube' class='mb-2'>Link Youtube</label>
                            <input type='text' name='link_youtube' id='link_youtube'
                                class='form-control @error('link_youtube') is-invalid @enderror'
                                value='{{ old('link_youtube') }}'>
                            @error('link_youtube')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='description' class='mb-2'>Description</label>
                            <textarea name='description' id='description' cols='30' rows='3'
                                class='form-control @error('description') is-invalid @enderror'>{{ old('description') }}</textarea>
                            @error('description')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group float-right'>
                            <a href="{{ route('previous-events.index') }}" class="btn btn-warning">Cancel</a>
                            <button class='btn btn-primary'>Create</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    @endpush
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#description').summernote({
                    height: 300
                });
            });
        </script>
    @endpush
</x-main-layout>
