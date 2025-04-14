<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Create Committee'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Committee', 'url' => route('committees.index')],
        ]" :active="'Create'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Create Committee</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('committees.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="previous_event_id" value="{{ request('previous_event_id') }}" hidden>
                        <div class='form-group mb-3'>
                            <label for='name' class='mb-2'>Nama</label>
                            <input type='text' name='name' id='name'
                                class='form-control @error('name') is-invalid @enderror' value='{{ old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='role' class='mb-2'>Peran</label>
                            <input type='text' name='role' id='role'
                                class='form-control @error('role') is-invalid @enderror' value='{{ old('role') }}'>
                            @error('role')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (request('previous_event_id') == null)
                            <div class='form-group mb-3'>
                                <label for='text' class='mb-2'>Teks</label>
                                <textarea name='text' id='text' cols='30' rows='3'
                                    class='form-control @error('text') is-invalid @enderror'>{{ old('text') }}</textarea>
                                @error('text')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
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
                        <div class="form-group text-right">
                            <a href="{{ route('committees.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Create Committee</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
