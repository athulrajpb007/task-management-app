<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    /**
     * GET /api/projects
     * Return all projects with task count
     */
    public function index()
    {
        $projects = Project::withCount('tasks')->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $projects,
        ]);
    }
}
