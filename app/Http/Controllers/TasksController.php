<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskFormRequest;
use App\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where(['user_id' => Auth::user()->id])->get();
        return view('tasks.index')->with(compact('tasks'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with(compact('task'));
    }

    public function update(TaskFormRequest $request, $id)
    {
        $input = $request->only([
            'title',
            'description',
            'status',
        ]);
        $task = Task::find($id);
        $task->fill($input)->save();
        return redirect()->route('tasks.index', $id)->with(['success' => 'Tarefa salva com sucesso']);
    }

    public function create(){
        return view('tasks.create');
    }

    public function show($id){
        $task = Task::find($id);
        return view('tasks.show')->with(compact('task'));
    }

    public function store(TaskFormRequest $request)
    {
        $input = $request->only([
            'title',
            'description',
            'status',
        ]);
        $task = new Task();
        $task->user_id = Auth::user()->id;
        $task->fill($input)->save();
        return redirect()->route('tasks.index')->with(['success' => 'Tarefa criada com sucesso']);
    }

    public function destroy($id){
        $task = Task::find($id);
        if ($task->user_id === Auth::user()->id){
            $task->delete();
        }
        return redirect()->route('tasks.index')->with(['success' => 'Tarefa excluída com sucesso']);
    }
}
