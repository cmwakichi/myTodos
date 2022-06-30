<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StatusController extends Controller
{
    public function create(){
        return view('status.create');
    }
    public function store(Request $request,status $status){
        $this->validate($request,[
            'status_id'=>['required','max:255']
        ]);
        $status->name = $request['status-id'];
        $status->save();
        return redirect()->to('/status');
    }
    public function index(){
        $statuses = status::all();
        return view('status.index',['statuses'=>$statuses]);
    }
}
