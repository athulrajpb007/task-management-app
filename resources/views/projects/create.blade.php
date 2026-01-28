<x-app-layout>

<x-slot name="header">
    <div class="flex items-center space-x-3">
        <a href="{{ url()->previous() }}" class="inline-flex items-center border border-gray-300 hover:bg-gray-50 text-gray-700 rounded px-3 py-1">
            Back
        </a>
        <h2 class="font-semibold text-xl">Create Project</h2>
    </div>
</x-slot>

<div class="py-8 max-w-3xl mx-auto">

    <form method="POST" action="{{ route('projects.store') }}"
        class="bg-white p-6 rounded shadow">
        
        @csrf

        @include('projects.partials.form')

        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
        Save
        </button>

    </form>

</div>
</x-app-layout>
