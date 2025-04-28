<x-projects.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-white rounded-lg p-4 mx-auto max-w-lg shadow border border-gray-200">

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data"
            class="text-gray-700 text-sm">
            @csrf
            @method('PUT')

            <div class="mb-5 mt-1">
                <span class="font-semibold text-base">Client</span>
            </div>

            <div class="mb-5">
                <label for="project-name" class="block mb-2 font-medium">Project Name</label>
                <input type="text" name="project_name" value="{{ old('project_name', $project->project_name) }}"
                    class="w-full text-sm px-3 py-2
                    rounded-md" />
            </div>

            <div class="mb-5">
                <label for="client-name" class="block mb-2 font-medium">Client Name</label>
                <input type="text" name="client" value="{{ old('client', $project->client) }}"
                    class="w-full text-sm px-3 py-2 rounded-md" />
            </div>

            <div class="mb-5">
                <label for="processing-time" class="block mb-2 font-medium">Processing Time</label>
                <div id="date-range-picker" date-rangepicker class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-start" name="start_date" type="text"
                            value="{{ old('start_date', \Carbon\Carbon::parse($project->start_date)->format('m/d/Y')) }}"
                            class="border border-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-end" name="end_date" type="text"
                            value="{{ old('end_date', \Carbon\Carbon::parse($project->end_date)->format('m/d/Y')) }}"
                            class="border border-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                            placeholder="Select date end">
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label for="progress" class="block font-semibold mb-2">Progress (%)</label>
                <input type="number" name="progress" value="{{ old('progress', $project->progress) }}"
                    class="w-full text-sm px-3 py-2 rounded-md" min="0" max="100">
            </div>

            <div class="my-5 pt-5 border-b border-gray-300"></div>

            <div class="mb-5">
                <span class="font-semibold text-base">Project Leader</span>
            </div>

            <div class="mb-5">
                <label for="leader-name" class="block mb-2 font-medium">Name</label>
                <input type="text" name="project_leader" id="project_leader"
                    value="{{ old('project_leader', $project->project_leader) }}"
                    class="w-full text-sm px-3 py-2 rounded-md" />
            </div>

            <div class="mb-5">
                <label for="leader-email" class="block mb-2 font-medium">Email</label>
                <input type="email" name="leader_email" id="leader_email"
                    value="{{ old('leader_email', $project->leader_email) }}"
                    class="w-full text-sm px-3 py-2 rounded-md" />
            </div>

            <div class="mb-5">
                <label for="photo" class="block mb-2 font-medium">Photo</label>
                {{-- <div class="flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <svg class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="mt-4 flex text-sm/6 text-gray-600">
                            <label for="file-upload"
                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div> --}}
                <div class="flex items-center gap-x-2">
                    @if ($project->leader_photo)
                        <div class="mb-2 w-20 h-20 flex-shrink-0 ">
                            <img src="{{ asset('storage/' . $project->leader_photo) }}" alt="Leader Photo"
                                class="w-full h-full rounded-full object-cover">
                        </div>
                    @endif
                    <input name="leader_photo" id="leader_photo"
                        class="w-full text-sm border border-gray-500 rounded-md cursor-pointer" type="file">
                </div>
            </div>

            <div class="flex gap-2 justify-end mb-1">
                <a href="{{ route('projects.index') }}"
                    class="px-4 py-3 rounded-lg text-white font-medium bg-red-500 hover:bg-red-600">Cancel</a>
                <button type="submit"
                    class="px-4 py-3 rounded-lg text-white font-medium cursor-pointer bg-blue-500 hover:bg-blue-600">Update</button>
            </div>

        </form>
    </div>
</x-projects.layout>
