<?php

namespace App\View\Components\manager\role;

use Illuminate\View\Component;

class table extends Component
{
    /**
     * Roles table data.
     *
     * @var string
     */
    public $tableData;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tableData)
    {
        $this->tableData = $tableData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.manager.role.table');
    }
}
