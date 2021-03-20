<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Repository;
use App\Models\User;

class UserController extends Controller
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = new Repository($user);
        $this->middleware('auth');
    }

    public function getTodos() 
    {
        return view('user.todos')->with(['todos' => Auth::user()->todos()->get()]);
    }
}