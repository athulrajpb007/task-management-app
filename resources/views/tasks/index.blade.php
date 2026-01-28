<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">Tasks</h2>
</x-slot>

<div class="py-8 max-w-7xl mx-auto">

@include('partials.flash')
@php
    $statuses = [
        'pending' => 'Pending',
        'in_progress' => 'In Progress',
        'completed' => 'Completed',
    ];
@endphp

<form class="grid grid-cols-1 md:grid-cols-4 gap-3 mb-4 items-end bg-white p-4 rounded shadow">

<select name="project_id" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-200" title="Filter by project">
<option value="">All Projects</option>
@foreach($projects as $project)
<option value="{{ $project->id }}"
{{ request('project_id')==$project->id?'selected':'' }}>
{{ $project->name }}
</option>
@endforeach
</select>

<select name="status" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-200" title="Filter by status">
<option value="">All Status</option>
@foreach($statuses as $value => $label)
    <option value="{{ $value }}" {{ request('status')==$value?'selected':'' }}>
        {{ $label }}
    </option>
@endforeach
</select>

<input name="assigned_to"
 value="{{ request('assigned_to') }}"
 class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-200"
 placeholder="Assigned to" title="Filter by assigned user">

<div class="flex items-center justify-end space-x-2">
    <button class="bg-indigo-600 hover:bg-indigo-700 text-white rounded px-8 py-2" title="Filter Tasks">
        Filter
    </button>

    <a href="{{ route('tasks.export') }}" class="bg-green-600 text-white px-4 py-2 rounded ml-2" title="Export Tasks">
        Export
    </a>

    <a href="{{ route('tasks.index') }}" class="inline-flex items-center border border-gray-300 hover:bg-gray-50 text-gray-700 rounded px-8 py-2" title="Reset Filters">
        Reset
    </a>
</div>

</form>

<a href="{{ route('tasks.create') }}"
 class="bg-blue-600 text-white px-4 py-2 rounded" title="Create a new task">
+ New Task
</a>

<table class="w-full mt-4 bg-white rounded shadow">

<tr class="bg-gray-200 border-b">
    <th class="p-3 text-left">Title</th>
    <th class="p-3 text-left">Project</th>
    <th class="p-3 text-left">Status</th>
    <th class="p-3 text-left">Assigned To</th>
    <th class="p-3 text-left">Actions</th>
</tr>
@foreach($tasks as $task)
<tr class="border-b">
<td class="p-3">{{ $task->title }}</td>
<td class="p-3">{{ $task->project->name }}</td>
<td class="p-3">{{ $statuses[$task->status] ?? ucfirst($task->status) }}</td>
<td class="p-3">{{ $task->assigned_to }}</td>
<td class="p-3">

<a href="{{ route('tasks.edit',$task) }}"
 class="text-indigo-600" title="Edit Task">Edit</a>

<form method="POST"
 action="{{ route('tasks.destroy',$task) }}"
 class="inline">
@csrf @method('DELETE')
<button onclick="return confirm('Delete this task?')" class="text-red-600 hover:underline" title="Delete Task">Delete</button>
</form>

</td>
</tr>
@endforeach

</table>

<div class="mt-4">{{ $tasks->links() }}</div>

</div>
</x-app-layout>
