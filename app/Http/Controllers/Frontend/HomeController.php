<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home | Event Management System';
        $event = Event::where('status', 1)->latest()->first();
        $latest_events = Event::where('status', 1)->latest()->limit(3)->get();
        return view('frontend.pages.home', compact('title', 'event', 'latest_events'));
    }
}
