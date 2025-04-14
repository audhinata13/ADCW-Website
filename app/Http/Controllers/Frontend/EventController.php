<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $items = Event::isOpen()->latest()->paginate(5);
        $title = 'Event';
        return view('frontend.pages.event.index', compact('items', 'title'));
    }

    public function show($slug)
    {
        $item = Event::isOpen()->where('slug', $slug)->firstOrFail();
        $title = $item->name;
        return view('frontend.pages.event.show', compact('title', 'item'));
    }
}
