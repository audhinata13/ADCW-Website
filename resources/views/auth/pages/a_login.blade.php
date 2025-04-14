@extends('auth.layouts.app')

@section('content')
    <section class="section" style="height: 100vh;">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Kiri - Background -->
                <div class="col-md-5 d-none d-md-block p-0">
                    <div
                        style="background-image: url('{{ asset('assets/frontend/images/login-admin.jpg') }}');
                                background-size: cover;
                                background-position: center;
                                height: 100%; width: 100%;">
                    </div>
                </div>

                <!-- Kanan - Form -->
                <div class="col-md-7 d-flex align-items-center justify-content-center">
                    <div class="w-75">
                        <div class="mb-5 text-center">
                            <h2>Welcome to <br> Ardhanari Dharma Chitta <br> Admin Website</h2>
                            <h5>Login</h5>
                        </div>
                        <form action="{{ route('login.process') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for='email' class='mb-2'>Email Address</label>
                                <input type='text' name='email' id='email'
                                    class='form-control @error('email') is-invalid @enderror' value='{{ old('email') }}'>
                                @error('email')
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
                            {{-- <a href="{{ route('forgot-password') }}">Forgot Password?</a> --}}

                            <div class='form-group mb-3 text-center'>
                                <button class="btn btn-black rounded px-5 py-2">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
