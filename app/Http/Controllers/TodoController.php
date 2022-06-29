<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Models\todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function create(){
        return view('todos.create');
    }
    public function index(User $user){
        $todos = todo::latest()->paginate(10);
        $statuses = status::all();
        return view('todos.index', ['todos'=>$todos,'statuses'=>$statuses]);
    }
    public function store(Request $request, todo $todo){
        $this->validate($request,[
            'description'=>['required','max:255']
        ]);
        $todo->description = $request['description'];
        $todo->user_id = \auth()->id();
        $todo->save();
        return redirect()->to('/todos');
    }
    public function edit(todo $todo){
        return view('todos.edit', ['todo'=>$todo]);
    }
    public function update(Request $request, todo $todo){
        $this->validate($request,['description'=>
        ['required']]);

        $todo->update(['description'=>$request->description]);
        return redirect()->to('/todos');
    }
    public function destroy(todo $todo){
        $todo->delete();
        return redirect()->to('/todos');
    }
}
