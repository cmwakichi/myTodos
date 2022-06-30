<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Models\todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{
    public function create(){
        $statuses = status::all();
        return view('todos.create',['statuses'=>$statuses]);
    }
    public function index(User $user){
        $todos = todo::latest()->paginate(10);
        $statuses = status::all();
        return view('todos.index', ['todos'=>$todos,'statuses'=>$statuses]);
    }
    public function store(Request $request, todo $todo){
        $this->validate($request,[
            'description'=>['required','max:255'],
            'status_id'=>['required',Rule::exists('statuses','id')]
        ]);
        $todo->description = $request['description'];
        $todo->status_id = $request['status_id'];
        $todo->user_id = \auth()->id();
        $todo->save();
        return redirect()->to('/todos');
    }
    public function edit(todo $todo){
        $statuses = status::all();
        return view('todos.edit', ['todo'=>$todo, 'statuses'=>$statuses]);
    }
    public function update(Request $request, todo $todo){
        $attributes = $this->validate($request,['description'=>
        ['required'],
        'status_id'=>['required',Rule::exists('statuses','id')]
        ]);

        $todo->update($attributes);
        return redirect()->to('/todos');
    }
    public function destroy(todo $todo){
        $todo->delete();
        return redirect()->to('/todos');
    }
}
