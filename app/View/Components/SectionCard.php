<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionCard extends Component
{
    public $header;
    public $footer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($header = null, $footer = null)
    {
        $this->header = $header;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section-card');
    }
}
