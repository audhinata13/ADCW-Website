<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $items = Faq::orderBy('question', 'ASC')->get();
        $title = 'Faq';
        return view('frontend.pages.faq', compact('items', 'title'));
    }
}
