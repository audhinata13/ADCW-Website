<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $bg;
    public $title;
    public $fluid;
    public function __construct($bg = true, $fluid = true, $title = '')
    {
        $this->fluid = $fluid;
        $this->bg = $bg;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.main-layout', [
            'bg' => $this->bg,
            'fluid' => $this->fluid,
            'title' => $this->title
        ]);
    }
}
