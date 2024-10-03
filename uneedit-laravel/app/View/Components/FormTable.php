<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormTable extends Component
{
    public $data;
    public $action; // Add action variable

    /**
     * Create a new component instance.
     *
     * @param array $data
     * @param string $action
     * @return void
     */
    public function __construct($data, $action)
    {
        $this->data = $data;
        $this->action = $action; // Assign action variable
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-table');
    }
}
