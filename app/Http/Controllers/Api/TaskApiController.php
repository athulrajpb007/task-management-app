<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    /**
     * GET /api/tasks
     */
    public function index()
    {
        $tasks = Task::with('project')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $tasks,
        ]);
    }

    /**
     * GET /api/projects/{id}/tasks
     */
    public function byProject($id)
    {
        $tasks = Task::where('project_id', $id)->get();

        return response()->json([
            'success' => true,
            'data' => $tasks,
        ]);
    }

    /**
     * PATCH /api/tasks/{id}/status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Task status updated',
            'data' => $task,
        ]);
    }
}
