<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Edit Event'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Events', 'url' => route('events.index')],
        ]" :active="'Edit'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Edit Event</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('events.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
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
                                class='form-control @error('name') is-invalid @enderror'
                                value='{{ $item->name ?? old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='location' class='mb-2'>Location</label>
                            <input type='text' name='location' id='location'
                                class='form-control @error('location') is-invalid @enderror'
                                value='{{ $item->location ?? old('location') }}'>
                            @error('location')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='pic' class='mb-2'>PIC</label>
                            <input type='text' name='pic' id='pic'
                                class='form-control @error('pic') is-invalid @enderror'
                                value='{{ $item->pic ?? old('pic') }}'>
                            @error('pic')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='date' class='mb-2'>Start Date Time</label>
                            <input type='datetime-local' name='date' id='date'
                                class='form-control @error('date') is-invalid @enderror'
                                value='{{ $item->date->translatedFormat('Y-m-d H:i:s') ?? old('date') }}'>
                            @error('date')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='end_date' class='mb-2'>End Date Time</label>
                            <input type='datetime-local' name='end_date' id='end_date'
                                class='form-control @error('end_date') is-invalid @enderror'
                                value='{{ $item->end_date ? $item->end_date->translatedFormat('Y-m-d H:i:s') : old('end_date') }}'>
                            @error('end_date')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='fee' class='mb-2'>Fee</label>
                            <input type='number' name='fee' id='fee'
                                class='form-control @error('fee') is-invalid @enderror'
                                value='{{ $item->fee ?? old('fee') }}'>
                            @error('fee')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class='form-group mb-3'>
                            <label for='description' class='mb-2'>Description</label>
                            <textarea name='description' id='description' cols='30' rows='3'
                                class='form-control @error('description') is-invalid @enderror'>{{ $item->description ?? old('description') }}</textarea>
                            @error('description')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='terms' class='mb-2'>Terms</label>
                            <textarea name='terms' id='terms' cols='30' rows='3'
                                class='form-control @error('terms') is-invalid @enderror'>{{ $item->terms ?? old('terms') }}</textarea>
                            @error('terms')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='fee_description' class='mb-2'>Participant Fee</label>
                            <textarea name='fee_description' id='fee_description' cols='30' rows='3'
                                class='form-control @error('fee_description') is-invalid @enderror'>{{ $item->fee_description ?? old('fee_description') }}</textarea>
                            @error('fee_description')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='status'>Status</label>
                            <select name='status' id='status'
                                class='form-control @error('status') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Status</option>
                                <option @selected($item->status == 0) value="0">Closed</option>
                                <option @selected($item->status == 1) value="1">Opened</option>
                                <option @selected($item->status == 2) value="2">Finished</option>
                            </select>
                            @error('status')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group float-right'>
                            <a href="{{ route('events.index') }}" class="btn btn-warning">Cancel</a>
                            <button class='btn btn-primary'>Update</button>
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
                $('#terms').summernote({
                    height: 300

                });
                $('#fee_description').summernote({
                    height: 300

                });
            });
        </script>
    @endpush
</x-main-layout>
