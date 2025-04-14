<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('pages.profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    public function update()
    {
        // request()->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'unique:users,email,id,' . auth()->user()->id],
        //     'password' => [Rule::when(request()->password, ['required', 'min:6'])],
        //     'password_confirmation' => [Rule::when(request()->password, ['required', 'same:password'])],
        // ]);

        try {
            $data = request()->only('name', 'email');
            if (request()->password) {
                $data['password'] = bcrypt(request()->password);
            }
            auth()->user()->update($data);
            return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('profile.index')->with('error', $th->getMessage());
        }
    }
}
