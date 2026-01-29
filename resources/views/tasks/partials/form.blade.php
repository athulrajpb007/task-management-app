<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium">Project</label>
        <select name="project_id" class="w-full border rounded p-2">
            <option value="">-- Select project --</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}"
                    {{ old('project_id', $task->project_id ?? '') == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
        @error('project_id')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Title</label>
        <input name="title"
               value="{{ old('title', $task->title ?? '') }}"
               class="w-full border rounded p-2"
               maxlength="255">
        @error('title')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Description</label>
        <textarea name="description"
                  class="w-full border rounded p-2" maxlength="2000">{{ old('description', $task->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Assigned To</label>
        <input name="assigned_to"
               value="{{ old('assigned_to', $task->assigned_to ?? '') }}"
               class="w-full border rounded p-2"
               maxlength="100">
        @error('assigned_to')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Status</label>
        @php
            $statuses = [
                'pending' => 'Pending',
                'in_progress' => 'In Progress',
                'completed' => 'Completed',
            ];
        @endphp
        <select name="status" class="w-full border rounded p-2">
            @foreach($statuses as $value => $label)
                <option value="{{ $value }}"
                    {{ old('status', $task->status ?? '') == $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('status')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Attachment</label>
        <input type="file" name="attachment" class="w-full border rounded p-2">
        @error('attachment')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Due Date</label>
        <input type="date"
               name="due_date"
               value="{{ old('due_date', $task->due_date ?? '') }}"
               class="w-full border rounded p-2"
               >
        @error('due_date')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

</div>
