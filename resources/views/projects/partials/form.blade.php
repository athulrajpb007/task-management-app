<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium">Name</label>
        <input name="name"
               value="{{ old('name', $project->name ?? '') }}"
               class="w-full border rounded p-2"
             maxlength="255">
        @error('name')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Description</label>
        <textarea name="description"
                  class="w-full border rounded p-2" maxlength="2000">{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">Start Date</label>
        <input type="date"
               name="start_date"
               value="{{ old('start_date', $project->start_date ?? '') }}"
               class="w-full border rounded p-2"
               >
        @error('start_date')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium">End Date</label>
        <input type="date"
               name="end_date"
               value="{{ old('end_date', $project->end_date ?? '') }}"
               class="w-full border rounded p-2"
               >
        @error('end_date')
            <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

</div>
