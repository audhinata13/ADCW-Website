<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = "Contact Us";
        $item = CompanyProfile::first();
        return view('frontend.pages.contact', compact('title', 'item'));
    }
}
