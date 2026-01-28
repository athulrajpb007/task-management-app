<div class="space-y-4">

    <div>
        <label class="block text-sm font-medium">Name</label>
        <input name="name"
               value="{{ old('name', $project->name ?? '') }}"
               class="w-full border rounded p-2"
               required maxlength="255">
        <p class="mt-1 text-red-600 text-sm" data-error-for="name" style="display:none"></p>
    </div>

    <div>
        <label class="block text-sm font-medium">Description</label>
        <textarea name="description"
                  class="w-full border rounded p-2" maxlength="2000">{{ old('description', $project->description ?? '') }}</textarea>
        <p class="mt-1 text-red-600 text-sm" data-error-for="description" style="display:none"></p>
    </div>

    <div>
        <label class="block text-sm font-medium">Start Date</label>
        <input type="date"
               name="start_date"
               value="{{ old('start_date', $project->start_date ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block text-sm font-medium">End Date</label>
        <input type="date"
               name="end_date"
               value="{{ old('end_date', $project->end_date ?? '') }}"
               class="w-full border rounded p-2">
    </div>

</div>
