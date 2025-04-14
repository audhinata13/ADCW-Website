@extends('auth.layouts.app')

@section('content')
    <section class="section d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h1>Email Verification</h1>
                    <p>
                        We’ve sent a link to your email.<br>
                        Please click the link to verify your account.
                    </p>


                    <form action="{{ route('frontend.retoken', [
                        'email' => $email,
                    ]) }}" method="POST">
                        @csrf
                        <p class="mt-5">Didn’t get the link?
                            <button type="submit" class="btn btn-link">
                                Send again
                            </button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
