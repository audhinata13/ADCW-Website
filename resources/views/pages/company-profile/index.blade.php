<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Edit Company Profile'" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Company Profiles', 'url' => route('company-profile.index')],
        ]" :active="'Edit'" />

        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Edit Company Profile</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('company-profile.update') }}" method="post" enctype="multipart/form-data">
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
                                class='form-control @error('name') is-invalid @enderror'
                                value='{{ $item->name ?? old('name') }}'>
                            @error('name')
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
                            <label for='address' class='mb-2'>Address</label>
                            <textarea name='address' id='address' cols='30' rows='3'
                                class='form-control @error('address') is-invalid @enderror'>{{ $item->address ?? old('address') }}</textarea>
                            @error('address')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='phone_number' class='mb-2'>Phone Number</label>
                            <input type='text' name='phone_number' id='phone_number'
                                class='form-control @error('phone_number') is-invalid @enderror'
                                value='{{ $item->phone_number ?? old('phone_number') }}'>
                            @error('phone_number')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='email' class='mb-2'>Email</label>
                            <input type='text' name='email' id='email'
                                class='form-control @error('email') is-invalid @enderror'
                                value='{{ $item->email ?? old('email') }}'>
                            @error('email')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='youtube' class='mb-2'>Link Youtube</label>
                            <input type='text' name='youtube' id='youtube'
                                class='form-control @error('youtube') is-invalid @enderror'
                                value='{{ $item->youtube ?? old('youtube') }}'>
                            @error('youtube')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='instagram' class='mb-2'>Link Instagram</label>
                            <input type='text' name='instagram' id='instagram'
                                class='form-control @error('instagram') is-invalid @enderror'
                                value='{{ $item->instagram ?? old('instagram') }}'>
                            @error('instagram')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='vision' class='mb-2'>Vision</label>
                            <textarea name='vision' id='vision' cols='30' rows='3'
                                class='form-control @error('vision') is-invalid @enderror'>{{ $item->vision ?? old('vision') }}</textarea>
                            @error('vision')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='mission' class='mb-2'>Mission</label>
                            <textarea name='mission' id='mission' cols='30' rows='3'
                                class='form-control @error('mission') is-invalid @enderror'>{{ $item->mission ?? old('mission') }}</textarea>
                            @error('mission')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group float-right'>
                            <a href="{{ route('company-profile.index') }}" class="btn btn-warning">Cancel</a>
                            <button class='btn btn-primary'>Update</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
