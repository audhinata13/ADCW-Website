<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\RegistrationEvent;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $title = 'Profile';
        $items = RegistrationEvent::where('status', 1)->where('user_id', auth()->user()->id)->latest()->get();
        return view('frontend.pages.profile.index', compact('title', 'items'));
    }

    public function update()
    {
        request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required'],
        ]);


        try {
            $data = request()->all();
            $data['name'] = request('first_name') . ' ' . request('last_name');
            $user = auth()->user()->update($data);
            Auth::login($user->fresh());
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
