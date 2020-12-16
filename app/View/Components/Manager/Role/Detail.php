<?php

namespace App\View\Components\manager\role;

use App\Services\ManagerRoleService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\Component;

class Detail extends Component
{
    /**
     * User data.
     * @var string
     */
    public $roleData;

    /**
     * Todo data.
     * @var string
     */
    public $permissionData;

    /**
     * Todo result message.
     * @var string
     */
    public $message;


    /**
     * Create a new component instance.
     * @return void
     */
    public function __construct($roleData)
    {
        $this->roleData = $roleData;
        $this->findPermission();
    }


    public function findPermission()
    {
        $role_id = $this->userData->id;

        try {
            $this->permissionData = (new ManagerRoleService())->findPermissions($role_id);
        } catch (ModelNotFoundException $exception) {
            $this->permissionData = false;
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
        return view('components.manager.role.detail');
    }
}
