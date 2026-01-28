<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::with('project');

        if ($request->project_id) {
            $query->where('project_id', $request->project_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->assigned_to) {
            $query->where('assigned_to', 'like', '%'.$request->assigned_to.'%');
        }

        $tasks = $query->latest()->paginate(10);
        $projects = Project::all();

        return view('tasks.index', compact('tasks','projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to' => 'required|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment'] =
                $request->file('attachment')->store('tasks','public');
        }

        Task::create($data);

        return redirect()->route('tasks.index')
            ->with('success','Task created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task','projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'assigned_to' => 'required|max:255',
            'status' => 'required|in:pending,in_progress,completed',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'due_date' => 'required|date',
        ]);

        if ($request->hasFile('attachment')) {
            $data['attachment'] =
                $request->file('attachment')->store('tasks','public');
        }

        $task->update($data);

        return redirect()->route('tasks.index')
            ->with('success','Task updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return back()->with('success','Task deleted!');
    }

    public function export()
    {
        return Excel::download(new TasksExport, 'tasks.xlsx');
    }

}
