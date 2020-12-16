<?php

namespace App\View\Components\manager;

use Illuminate\View\Component;

class dashboardCard extends Component
{

    /**
     * The Dashboard card data.
     *
     * @var string
     */
    public $cardData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardData)
    {
        $this->cardData = $cardData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.manager.dashboard-card');
    }
}
