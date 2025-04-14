<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.pages.login', [
            'title' => 'Login'
        ]);
    }

    public function a_login()
    {
        return view('auth.pages.a_login', [
            'title' => 'Login'
        ]);
    }

    public function login_process()
    {
        request()->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        try {
            $credentials = request()->only('email', 'password');
            $remember = request()->has('remember');

            if (Auth::attempt($credentials, $remember)) {

                if (Auth::user()->email_verified_at == null) {
                    return redirect()->route('frontend.verify', [
                        'email' => Auth::user()->email
                    ]);
                    Auth::logout();
                }
                if (Auth::user()->hasRole('admin')) {
                    return redirect()->intended('dashboard');
                } else {
                    return redirect()->intended('/');
                }
                return redirect()->intended('dashboard');
            } else {
                return redirect()->route('login')->with('error', 'Invalid email or password');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('login')->with('error', $th->getMessage());
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.pages.register', [
            'title' => 'Register'
        ]);
    }

    public function register_process()
    {
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
            'password' => ['required', 'confirmed', 'min:5'],
            'password_confirmation' => ['required'],
        ]);


        try {
            $data = request()->all();
            $data['name'] = request('first_name') . ' ' . request('last_name');
            $data['password'] = bcrypt(request('password'));
            $user = User::create($data);
            $user->assignRole('user');


            $token = \Str::random(64);
            EmailVerification::create([
                'user_id' => $user->id,
                'token' => $token,
            ]);

            // Kirim email
            Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $token));

            return redirect()->route('frontend.verify', [
                'email' => $user->email
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function forgot_password()
    {
        return view('auth.pages.forgot-password', [
            'title' => 'Forgot Password'
        ]);
    }

    public function verifyEmail($token)
    {
        $verification = EmailVerification::where('token', $token)->first();

        if (!$verification) {
            return redirect('/login')->with('error', 'Token tidak valid atau sudah digunakan.');
        }

        $user = $verification->user;
        $user->email_verified_at = now();
        $user->save();

        $verification->delete();

        return redirect('/login')->with('success', 'Email berhasil diverifikasi. Silakan login.');
    }

    public function verify()
    {
        $email = request('email');
        return view('auth.pages.verify', [
            'title' => 'Verify',
            'email' => $email
        ]);
    }

    public function retoken()
    {
        $email = request('email');
        $emailVerify = EmailVerification::whereHas('user', function ($query) use ($email) {
            $query->where('email', $email);
        })->first();

        if (!$emailVerify) {
            return redirect()->route('frontend.verify')->with('error', 'Email not found.');
        }

        $user = $emailVerify->user;
        $emailVerify->delete();

        $token = \Str::random(64);
        EmailVerification::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        // Kirim email
        Mail::to($user->email)->send(new \App\Mail\VerifyEmail($user, $token));

        return redirect()->route('frontend.verify', [
            'email' => $user->email
        ])->with('success', 'Email has been sent.  Please check your email.');
    }
}
