<x-projects.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="{{ route('projects.index') }}" method="GET" class="max-w-md mx-auto">
        {{-- Search --}}
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="search" id="default-search" value="{{ request('search') }}"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search Project, Client..." required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

    <form action="{{ route('projects.index') }}" method="GET" class="mt-5 flex gap-2 justify-center">
        {{-- Filter Progress --}}
        <select name="progress_filter" class="w-52 text-sm px-3 py-2 rounded-lg">
            <option value="">All Progress</option>
            <option value="completed" {{ request('progress_filter') == 'completed' ? 'selected' : '' }}>Completed (100%)
            </option>
            <option value="in_progress" {{ request('progress_filter') == 'in_progress' ? 'selected' : '' }}>In Progress
                (&lt;100%)</option>
        </select>

        {{-- Sort Order --}}
        <select name="sort_order" class="w-52 text-sm px-3 py-2 rounded-lg">
            <option value="latest" {{ request('sort_order') == 'latest' ? 'selected' : '' }}>Start Date: Newest First
            </option>
            <option value="oldest" {{ request('sort_order') == 'oldest' ? 'selected' : '' }}>Start Date: Oldest First
            </option>
        </select>

        {{-- Apply Filter --}}
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 text-sm">
            Apply
        </button>

        {{-- Reset Filter --}}
        <a href="{{ route('projects.index') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 text-sm">
            Reset
        </a>
    </form>

    <div class="my-5 flex justify-end">
        <a href="/projects/create" class="bg-green-500 text-white text-sm py-2 px-4 rounded-lg flex hover:bg-green-600">
            <span class="feather--folder-plus mr-2"></span>
            <h1>New Project</h1>
        </a>
    </div>


    <div class="relative overflow-x-auto rounded-lg shadow border border-gray-200">
        <table id="search-table" class="w-full text-xs text-left">
            @if (session('success'))
                <div class="m-4 p-4 bg-green-100 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <thead class="text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-6">
                        Project Name
                    </th>
                    <th scope="col" class="p-6">
                        Client
                    </th>
                    <th scope="col" class="p-6">
                        Project Leader
                    </th>
                    <th scope="col" class="p-6">
                        Start Date
                    </th>
                    <th scope="col" class="p-6">
                        End Date
                    </th>
                    <th scope="col" class="p-6">
                        Progress
                    </th>
                    <th scope="col" class="p-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @forelse ($projects as $index => $project)
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $project->project_name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $project->client }}
                        </td>
                        <td class="px-6 py-4 flex items-center">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $project->leader_photo) }}"
                                alt="Jese image">
                            <div class="ps-3">
                                <div class="font-bold">{{ $project->project_leader }}</div>
                                <div>{{ $project->leader_email }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($project->start_date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($project->end_date)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1.5">
                                <div class="bg-gray-200 w-28 rounded-full h-2.5">
                                    <div class="h-2.5 rounded-full
                                        {{ $project->progress == 100 ? 'bg-green-500' : 'bg-blue-500' }}"
                                        style="width: {{ $project->progress }}%"></div>
                                </div>
                                <h4 class="font-bold">{{ $project->progress }}%</h4>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1 text-white">
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex p-1.5 bg-red-500 rounded hover:bg-red-600 cursor-pointer"><span
                                            class="feather--trash-2"></span></button>
                                </form>
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="flex p-1.5 bg-green-500 rounded hover:bg-green-600"><span
                                        class="feather--edit-2"></span></a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-xl py-4">No projects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $projects->onEachSide(1)->links() }}
    </div>

</x-projects.layout>
