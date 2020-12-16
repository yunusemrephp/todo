<?php

namespace App\View\Components\manager\user;

use App\Exceptions\TodoNotFoundException;
use App\Services\TodoService;
use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * User data.
     *
     * @var string
     */
    public $userData;

    /**
     * Todo data.
     *
     * @var string
     */
    public $todoData;

    /**
     * Todo result message.
     *
     * @var string
     */
    public $message;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($userData)
    {
        $this->userData = $userData;
        $this->findTodo();
    }

    public function findTodo()
    {
        $user_id = $this->userData->id;

        try {
            $this->todoData = (new TodoService())->findByStatus(null, $user_id);
        } catch (TodoNotFoundException $exception) {
            $this->todoData = false;
            $this->message = $exception->getMessage();
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.manager.user.detail');
    }
}
