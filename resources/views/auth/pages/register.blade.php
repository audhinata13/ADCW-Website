@extends('auth.layouts.app')

@section('content')
    <section class="section" style="height: 100vh;">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Kiri - Background -->
                <div class="col-md-5 d-none d-md-block p-0">
                    <div
                        style="background-image: url('{{ asset('assets/frontend/images/bg-auth.jpg') }}');
                                background-size: cover;
                                background-position: center;
                                height: 100%; width: 100%;">
                    </div>
                </div>

                <!-- Kanan - Form -->
                <div class="col-md-7 d-flex align-items-center justify-content-center">
                    <div class="w-75">
                        <div class="mb-5 text-center">
                            <h2>Welcome to <br> Ardhanari Dharma Chitta Website</h2>
                            <h5>Create Account</h5>
                        </div>

                        <form action="{{ route('register.process') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='first_name' class='mb-2'>First Name</label>
                                        <input type='text' name='first_name' id='first_name'
                                            class='form-control @error('first_name') is-invalid @enderror'
                                            value='{{ old('first_name') }}'>
                                        @error('first_name')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class='form-group mb-3'>
                                        <label for='last_name' class='mb-2'>Last Name</label>
                                        <input type='text' name='last_name' id='last_name'
                                            class='form-control @error('last_name') is-invalid @enderror'
                                            value='{{ old('last_name') }}'>
                                        @error('last_name')
                                            <div class='invalid-feedback'>{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for='email' class='mb-2'>Email Address</label>
                                <input type='text' name='email' id='email'
                                    class='form-control @error('email') is-invalid @enderror' value='{{ old('email') }}'>
                                @error('email')
                                    <div class='invalid-feedback'>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for='phone_number' class='mb-2'>Phone Number</label>
                                <input type='text' name='phone_number' id='phone_number'
                                    class='form-control @error('phone_number') is-invalid @enderror'
                                    value='{{ old('phone_number') }}'>
                                @error('phone_number')
                                    <div class='invalid-feedback'>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class='form-group mb-3'>
                                <label for='password' class='mb-2'>Password</label>
                                <input type='password' name='password' id='password'
                                    class='form-control @error('password') is-invalid @enderror'>
                                @error('password')
                                    <div class='invalid-feedback'>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class='form-group mb-3'>
                                <label for='password_confirmation' class='mb-2'>Confirm Password</label>
                                <input type='password' name='password_confirmation' id='password_confirmation'
                                    class='form-control @error('password_confirmation') is-invalid @enderror'>
                                @error('password_confirmation')
                                    <div class='invalid-feedback'>{{ $message }}</div>
                                @enderror
                            </div>

                            <div class='form-group mb-3 text-center'>
                                <button class="btn btn-black rounded px-5 py-2">Create Account</button>
                            </div>
                        </form>

                        <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
