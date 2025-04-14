<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionHeader extends Component
{
    public $title;
    public $breadcrumbs;
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $breadcrumbs = [], $active = null)
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section-header');
    }
}
