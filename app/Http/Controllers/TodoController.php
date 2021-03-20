<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Repository;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    private $model;
 
    public function __construct(Todo $todo) 
    {
        $this->model = new Repository($todo);
        $this->middleware('auth');
    }

    public function add() 
    {
        return view('todo.add');
    }

    public function edit($id) 
    {
        $this->checkUserOwnership($id);
        
        return view('todo.edit')->with(['id' => $id, 'todo' => $this->model->show($id)]);
    }

    public function createTodo(TodoRequest $request) 
    {
        $this->model->create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return redirect()->route('user.todos')->with('success', __("Task added!"));
    }

    public function updateTodo($id, TodoRequest $request) 
    {
        $this->checkUserOwnership($id);
        
        $validated = $request->validated();
        if(array_key_exists('thumbnail', $validated)) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $request->file('thumbnail')->hashName();
            $validated['thumbnail_path'] = '/storage/thumbnails/' . $request->file('thumbnail')->hashName();
        }

        $this->model->update($validated, $id);

        return redirect()->route('user.todos')->with('success', __("Task updated!"));
    }

    public function finishTodo($id) 
    {
        $this->checkUserOwnership($id);
        $this->model->update(['finished' => true], $id);

        return redirect()->route('user.todos')->with('success', __("Task Finished!"));
    }

    public function deleteTodo($id) 
    {
        $this->checkUserOwnership($id);
        $this->deleteThumbnailFromStorage($id);
        $this->model->delete($id);
        
        return redirect()->route('user.todos')->with('success', __("Task Deleted!"));
    }

    private function checkUserOwnership($id) {
        return Auth::id() === $this->model->show($id)->user_id ? true : abort(401);
    }

    private function deleteThumbnailFromStorage($id) {
        return Storage::disk('public')->delete('/thumbnails/' . $this->model->show($id)->thumbnail);
    }
}