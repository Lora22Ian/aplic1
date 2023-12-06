<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('name','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('tasks.list',compact('tasks'))->with('i',$value);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required','description' => 'required']);
         // create new task
         Task::create($request->all());
         return redirect()->route('tasks.index')->with('success', 'Your task added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view('tasks.show',compact('task')); 
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        Task::find($id)->update($request->all());
        return redirect()->route('tasks.index')->with('success','Task updated successfully');    
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index')->with('success','Task removed successfully');
    }
}
