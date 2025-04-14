<x-main-layout :title="$title">
    <x-section>
        <x-section-header :title="'Profile'" :breadcrumbs="[['label' => 'Dashboard', 'url' => route('dashboard')]]" :active="'Profile'" />
        <x-section-body>
            <x-section-card>
                <x-slot name="header">
                    <h4>Profile</h4>
                </x-slot>
                <x-slot name="body">
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        <div class='form-group'>
                            <label for='name' class='mb-2'>Name <span class='text-danger small'>*</span></label>
                            <input type='text' name='name' id='name'
                                class='form-control @error('name') is-invalid @enderror'
                                value='{{ $user->name ?? old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='email' class='mb-2'>Email <span class='text-danger small'>*</span></label>
                            <input type='text' name='email' id='email'
                                class='form-control @error('email') is-invalid @enderror'
                                value='{{ $user->email ?? old('email') }}'>
                            @error('email')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='password' class='mb-2'>Password <span
                                    class='text-danger small'>*</span></label>
                            <input type='password' name='password' id='password'
                                class='form-control @error('password') is-invalid @enderror'
                                value='{{ old('password') }}'>
                            @error('password')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='password_confirmation' class='mb-2'>Password Confirmation <span
                                    class='text-danger small'>*</span></label>
                            <input type='password' name='password_confirmation' id='password_confirmation'
                                class='form-control @error('password_confirmation') is-invalid @enderror'
                                value='{{ old('password_confirmation') }}'>
                            @error('password_confirmation')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group float-right'>
                            <button class='btn btn-primary'>Update</button>
                        </div>
                    </form>
                </x-slot>
            </x-section-card>
            <x-section-card>
            </x-section-card>
        </x-section-body>
    </x-section>
</x-main-layout>
