<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $type;
    public $required;
    public $placeholder;
    public $value;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $type
     * @param bool $required
     */
    public function __construct($name, $label, $type = 'text', $required = false, $placeholder = null, $value = null, $class = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
