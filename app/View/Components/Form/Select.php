<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $label;
    public $options;
    public $selected;
    public $required;
    public $class;
    public $multiple;

    public function __construct($name, $label, $options = [], $selected = null, $required = false, $class = '', $multiple = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = is_array($selected) ? $selected : (array) $selected;
        $this->required = $required;
        $this->class = $class;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('components.form.select');
    }
}
