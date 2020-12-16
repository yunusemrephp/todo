<?php

namespace App\View\Components\manager;

use Illuminate\View\Component;

class main extends Component
{
    /**
     * The manager operation type.
     *
     * @var string
     */
    public $type;

    /**
     * The manager listing datas.
     *
     * @var string
     */
    public $managerData;

    /**
     * The manager operation title.
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $managerData, $title)
    {
        $this->type = $type;
        $this->managerData = $managerData;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.manager.main');
    }
}
