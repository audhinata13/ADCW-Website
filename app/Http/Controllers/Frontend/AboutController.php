<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CompanyProfile;
use App\Models\PreviousEvent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $title = "About Us";
        $item = CompanyProfile::first();
        $committees = Committee::whereNull('previous_event_id')->get()->groupBy('role');
        // dd($committees);
        $previous_events = PreviousEvent::latest()->limit(6)->get();
        return view('frontend.pages.about', compact('title', 'item', 'previous_events', 'committees'));
    }
}
