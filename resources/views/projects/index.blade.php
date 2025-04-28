<x-projects.layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mb-8 flex justify-end">
        <a href="#" class="bg-green-500 text-white text-sm py-2 px-4 rounded-full flex hover:bg-green-600">
            <span class="feather--folder-plus mr-2"></span>
            <h1>New Project</h1>
        </a>
    </div>

    <div class="relative overflow-x-auto rounded-lg shadow border border-gray-200">
        <table class="w-full text-xs text-left">
            <thead class="text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-6">
                        Project Name
                    </th>
                    <th scope="col" class="px-6 py-6">
                        Client
                    </th>
                    <th scope="col" class="px-6 py-6">
                        Project Leader
                    </th>
                    <th scope="col" class="px-6 py-6">
                        Start Date
                    </th>
                    <th scope="col" class="px-6 py-6">
                        End Date
                    </th>
                    <th scope="col" class="px-6 py-6">
                        Progress
                    </th>
                    <th scope="col" class="px-6 py-6">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                <tr class="bg-white">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        Apple MacBook Pro 17
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <img class="w-10 h-10 rounded-full" src="/build/assets/images.jpeg" alt="Jese image">
                        <div class="ps-3">
                            <div class="font-bold">Neil Sims</div>
                            <div>neil.sims@flowbite.com</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1.5">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                            </div>
                            <h4 class="font-bold">45%</h4>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1 text-white">
                            <a href="#" class="flex p-1.5 bg-red-500 rounded hover:bg-red-600"><span
                                    class="feather--trash-2"></span></a>
                            <a href="#" class="flex p-1.5 bg-green-500 rounded hover:bg-green-600"><span
                                    class="feather--edit-2"></span></a>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        Microsoft Surface Pro
                    </th>
                    <td class="px-6 py-4">
                        White
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <img class="w-10 h-10 rounded-full" src="/build/assets/images.jpeg" alt="Jese image">
                        <div class="ps-3">
                            <div class="font-bold">Neil Sims</div>
                            <div>neil.sims@flowbite.com</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        $1999
                    </td>
                    <td class="px-6 py-4">
                        $1999
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1.5">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                            </div>
                            <h4 class="font-bold">45%</h4>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1 text-white">
                            <a href="#" class="flex p-1.5 bg-red-500 rounded hover:bg-red-600"><span
                                    class="feather--trash-2"></span></a>
                            <a href="#" class="flex p-1.5 bg-green-500 rounded hover:bg-green-600"><span
                                    class="feather--edit-2"></span></a>
                        </div>
                    </td>
                </tr>
                <tr class="bg-white">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        Magic Mouse 2
                    </th>
                    <td class="px-6 py-4">
                        Black
                    </td>
                    <td class="px-6 py-4 flex items-center">
                        <img class="w-10 h-10 rounded-full" src="/build/assets/images.jpeg" alt="Jese image">
                        <div class="ps-3">
                            <div class="font-bold">Neil Sims</div>
                            <div>neil.sims@flowbite.com</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        $99
                    </td>
                    <td class="px-6 py-4">
                        $99
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1.5">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                            </div>
                            <h4 class="font-bold">45%</h4>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1 text-white">
                            <a href="#" class="flex p-1.5 bg-red-500 rounded hover:bg-red-600"><span
                                    class="feather--trash-2"></span></a>
                            <a href="#" class="flex p-1.5 bg-green-500 rounded hover:bg-green-600"><span
                                    class="feather--edit-2"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</x-projects.layout>
