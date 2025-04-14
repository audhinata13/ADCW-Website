<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RegistrationEvent;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'user' => User::whereHas('roles', function ($query) {
                $query->where('name', 'user');
            })->count(),
            'registration' => RegistrationEvent::where('status', 0)->count(),
            'event' => Event::count()
        ];
        return view('pages.dashboard', [
            'title' => 'Dashboard',
            'count' => $count
        ]);
    }
}
