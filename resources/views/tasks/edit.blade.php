<x-app-layout>

<x-slot name="header">
  <div class="flex items-center space-x-3">
    <a href="{{ url()->previous() }}" class="inline-flex items-center border border-gray-300 hover:bg-gray-50 text-gray-700 rounded px-3 py-1">
      Back
    </a>
    <h2 class="font-semibold text-xl">
      {{ isset($task)?'Edit':'Create' }} Task
    </h2>
  </div>
</x-slot>

<div class="py-8 max-w-3xl mx-auto">

<form method="POST"
      enctype="multipart/form-data"
      action="{{ isset($task)
        ? route('tasks.update',$task)
        : route('tasks.store') }}"
      class="bg-white p-6 rounded shadow">

@csrf
@if(isset($task)) @method('PUT') @endif

@include('tasks.partials.form')

<button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
Save
</button>

</form>

</div>
</x-app-layout>
