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
                            <h5>Foorgot Password</h5>
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

                            <div class='form-group mb-3 text-center'>
                                <button class="btn btn-black rounded px-5 py-2">Send Email Verification</button>
                            </div>
                        </form>

                        <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
