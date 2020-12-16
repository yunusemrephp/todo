<?php
namespace App\Services;

use App\Exceptions\TodoNotFoundException;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use function Composer\Autoload\includeFile;

class TodoService
{

    public function findById($id)
    {
        $todoData = User::find(Auth::user()->id)->todoList()->where('id', $id)->firstOrFail();
        return $todoData;
    }

    public function findByStatus($status = null, $user_id = null)
    {
        if(is_null($user_id)){
            $user = Auth::user()->id;
        } else{
            $user = $user_id;
        }

        if(is_null($user)){
            $user = Auth::user()->id;
        }

        if(is_null($status)){
            $todoData = User::find($user)->todoList;
            if(count($todoData) < 1){
                throw new TodoNotFoundException(config('todo.messages.0'));
            }

        } else{
            $todoData = User::find($user)->todoList->where('status', $status);
            if(count($todoData) < 1){
                throw new TodoNotFoundException(config('todo.messages.0'));
            }

        }
        return $todoData;
    }
}
