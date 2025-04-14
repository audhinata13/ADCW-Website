<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public $id;
    public $label;
    public $value;
    public $checked;
    public $name;
    public $class;

    /**
     * Create a new component instance.
     *
     * @param string $id
     * @param string $label
     * @param string $value
     * @param bool $checked
     */
    public function __construct($id, $label, $value = '', $checked = false, $name, $class = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->value = $value;
        $this->checked = $checked;
        $this->name = $name;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
