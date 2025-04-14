<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
    public string $action;
    public string $id;
    public string $class;
    public string $buttonClass;

    /**
     * Create a new component instance.
     */
    public function __construct(string $action, string $id, string $class = '', string $buttonClass = 'btn btn-danger')
    {
        $this->action = $action;
        $this->id = $id;
        $this->class = $class;
        $this->buttonClass = $buttonClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-button');
    }
}
