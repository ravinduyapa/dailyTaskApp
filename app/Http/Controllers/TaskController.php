<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'task' => 'required|max:100|min:5',
        ]);

        $task = new Task;
        $task->task = $request->input('task');
        $task->save();

        $data = Task::all();
        return view('tasks')->with('tasks', $data);
    }

    public function updateTaskAsCompleted($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->isCompleted = 1;
            $task->save();
        }

        return redirect()->back();
    }

    public function updateTaskAsNotCompleted($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->isCompleted = 0;
            $task->save();
        }

        return redirect()->back();
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);

        if ($task) {
            $task->delete();
        }

        return redirect()->back();
    }

    public function updateTask($id)
    {
        $task = Task::find($id);

        return view('updatetask')->with('taskdata', $task);
    }

    public function updateTasks(Request $request)
    {
        $id = $request->id;
        $task = $request->task;

        $data = Task::find($id);

        if ($data) {
            $data->task = $task;
            $data->save();
        }

        $datas = Task::all();

        return view('tasks')->with('tasks', $datas);
    }
}
