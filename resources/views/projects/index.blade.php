<x-app-layout>

    {{-- Page Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Create Button --}}
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">All Projects</h3>

                <a href="{{ route('projects.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700" title="Create a new project">
                    + New Project
                </a>
            </div>

            {{-- Projects Table --}}
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Dates
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                Tasks
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">

                        @forelse($projects as $project)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $project->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->format('d/m/Y') : '-' }}
                                    &nbsp;→&nbsp;
                                    {{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') : '-' }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $project->tasks_count }}
                                </td>

                                <td class="px-6 py-4 text-right space-x-2">

                                    <a href="{{ route('projects.show', $project) }}"
                                       class="text-yellow-600 hover:underline" title="View Project">
                                        View
                                    </a>

                                    <a href="{{ route('projects.edit', $project) }}"
                                       class="text-indigo-600 hover:underline" title="Edit Project">
                                        Edit
                                    </a>

                                    <form action="{{ route('projects.destroy', $project) }}"
                                          method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete this project?')"
                                                class="text-red-600 hover:underline" title="Delete Project">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No projects found.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>