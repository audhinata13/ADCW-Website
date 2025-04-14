<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function seen()
    {
        Notification::where('user_id', auth()->id())->update(['status' => 1]);
        return redirect()->back();
    }
}
