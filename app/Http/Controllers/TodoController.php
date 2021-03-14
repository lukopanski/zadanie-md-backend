<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    private $model;
 
    public function __construct(Todo $todo) 
    {
        $this->model = new Repository($todo);
    }
    
    public function index() 
    {
        return view('todo.index')->with(['todos' => $this->model->all()]);
    }

    public function add() 
    {
        return view('todo.add');
    }

    public function edit($id) 
    {
        return view('todo.edit')->with(['id' => $id, 'todo' => $this->model->show($id)]);
    }

    public function createTodo(TodoRequest $request) 
    {
        $this->model->create($request->validated());

        return redirect('/')->with('success', __("Task added!"));
    }

    public function updateTodo($id, TodoRequest $request) 
    {
        $validated = $request->validated();
        if(array_key_exists('thumbnail', $validated)) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $request->file('thumbnail')->hashName();
            $validated['thumbnail_path'] = '/storage/thumbnails/' . $request->file('thumbnail')->hashName();
        }

        $this->model->update($validated, $id);

        return redirect('/')->with('success', __("Task updated!"));
    }

    public function finishTodo($id) 
    {
        $this->model->update(['finished' => true], $id);

        return redirect('/')->with('success', __("Task Finished!"));
    }

    public function deleteTodo($id) 
    {
        $this->model->deleteThumbnailFromStorage($id);
        $this->model->delete($id);
        
        return redirect('/')->with('success', __("Task Deleted!"));
    }
}