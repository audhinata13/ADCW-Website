<?php

namespace App\View\Components\Frontend;

use App\Models\Notification;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $notifications = auth()->id() ? Notification::where('user_id', auth()->user()->id)->latest()->get() : [];
        $notifications_seen = auth()->id() ? Notification::where('user_id', auth()->user()->id)->where('status', 0)->latest()->get() : [];
        return view('components.frontend.navbar', [
            'notifications' => $notifications,
            'notifications_seen' => $notifications_seen,
        ]);
    }
}
