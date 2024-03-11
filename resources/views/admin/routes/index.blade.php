<x-admin-layout>
    <div class="relative shadow-md sm:rounded-lg w-full">
        <div class="container flex justify-center align-middle place-items-center flex-col">
            <h2 class=" text-black text-center font-bold gap-3 pb-2">Route Genrator <span class="text-red-500">DANGER
                    ZONE</span></h2>
            <a href="{{route('admin.routes.generate')}}" onclick="return confirm('Are you shure you want to generate new routes?')" class="btn rounded bg-red-800 px-4 py-2 hover:bg-red-900 hover:cursor text-white w-30 m">Generate Route
                Names</a>
        </div>
        @foreach ($route_groups as $group => $routes)
            <div class="container py-1 " :class="{ 'block': open, 'hidden': !open }">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6 w-50">
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
            </div>
        @endforeach
    </div>

</x-admin-layout>
