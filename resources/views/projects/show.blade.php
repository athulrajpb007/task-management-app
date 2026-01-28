<x-app-layout>

<x-slot name="header">
    <div class="flex items-center space-x-3">
        <a href="{{ url()->previous() }}" class="inline-flex items-center border border-gray-300 hover:bg-gray-50 text-gray-700 rounded px-3 py-1">
            Back
        </a>
        <h2 class="font-semibold text-xl">{{ $project->name }}</h2>
    </div>
</x-slot>

<div class="py-8 max-w-6xl mx-auto">

<div class="bg-white p-6 rounded shadow mb-6">

<p><b>Description:</b> {{ $project->description }}</p>
<p><b>Dates:</b>
    {{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') : '-' }}
    &nbsp;→&nbsp;
    {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') : '-' }}
</p>

</div>

<h3 class="font-semibold mb-3">Tasks</h3>

<div class="bg-white rounded shadow">

<table class="w-full">

@foreach($project->tasks as $task)
<tr class="border-b">
<td class="p-3">{{ $task->title }}</td>
<td class="p-3">{{ $task->status }}</td>
<td class="p-3">{{ $task->assigned_to }}</td>
</tr>
@endforeach

</table>

</div>

</div>
</x-app-layout>
