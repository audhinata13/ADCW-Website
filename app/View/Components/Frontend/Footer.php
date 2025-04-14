<?php

namespace App\View\Components\Frontend;

use App\Models\CompanyProfile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
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
        $profile = CompanyProfile::first();
        return view('components.frontend.footer', compact('profile'));
    }
}
