<x-admin-layout>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full">
        @foreach ($route_groups as $group => $routes)
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            {{ $group }} | Route name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Permission name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($routes as $route)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $route }}
                            </th>
                            <td class="py-4 px-6">
                                Sliver
                            </td>
                            <td class="py-4 px-6">
                                Laptop
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>

</x-admin-layout>
