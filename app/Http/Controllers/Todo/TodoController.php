<?php

namespace App\Http\Controllers\Todo;

use App\Exceptions\TodoNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Services\TodoService;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * For auth middleware.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.alert');
    }


    /**
     * list all todo
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        try {
            $todoData = (new TodoService())->findByStatus();
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', ['error' => $exception->getMessage()]);
        }

        $type = 'list';
        $title = "Todo's";

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * unfinished todo list.
     * @return \Illuminate\Http\Response
     */
    public function unfinished()
    {
        try {
            $todoData = (new TodoService())->findByStatus(config('todo.status.Unfinished'));
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', ['error' => $exception->getMessage()]);
        }

        $type = 'list';
        $title = "Unfinished Todo's";

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * Finished todo list.
     * @return \Illuminate\Http\Response
     */
    public function finished()
    {
        try {
            $todoData = (new TodoService())->findByStatus(config('todo.status.Finished'));
        } catch (TodoNotFoundException $exception) {
            return view('errors.notfound', ['error' => $exception->getMessage()]);
        }

        $type = 'list';
        $title = "Finished Todo's";

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * Show detail the todo.
     *
     * @param  \App\Models\Todo  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $todoData = (new TodoService())->findById($id);

        $type = 'detail';
        $title = $todoData->title." - Detail";

        return view('todo')->with(compact('type', 'todoData', 'title'));
    }

    /**
     * Show the form for creating a new todo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Create new todo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        Todo::create($request->all() + ['user_id' => Auth::user()->id]);

        return redirect()->route('todo-list')
            ->with('success', config('todo.create_message'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $todoData = (new TodoService())->findById($id);
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', ['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
        }
        return view('todo.edit', compact('todoData'));
    }

    /**
     * Update selected todo.
     *
     * @param  \Illuminate\Http\Request\TodoRequest  $request
     * @param  \App\Models\Todo  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        try {
            $todoData = (new TodoService())->findById($id);
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', ['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
        }

        $todoData->title = request('title');
        $todoData->desc = request('desc');
        $todoData->updated_at = now()->timestamp;
        $todoData->save();

        return redirect()->route('detail', $id)
            ->with('success','Todo updated successfully');
    }

    /**
     * Remove selected todo.
     *
     * @param  \App\Models\Todo  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            (new TodoService())->findById($id);
        } catch (TodoNotFoundException $exception) {
            return view('errors.404', ['error' => $exception->getMessage(), 'code' => $exception->getCode()]);
        }

        Todo::find($id)->delete();
        return redirect()->route('todo-list')
            ->with('success','Todo deleted successfully');
    }
}
