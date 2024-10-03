<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormTable extends Component
{
    public $table_data;
    public $action; // Add action variable

    /**
     * Create a new component instance.
     *
     * @param array $table_data
     * @param string $action
     * @return void
     */
    public function __construct($tableData, $action)
    {
        $this->table_data = $tableData;
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
