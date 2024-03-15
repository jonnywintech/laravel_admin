@section('vite_header')
    @vite('resources/js/admin/route-permissions/index.js')
@endsection
<x-admin-layout>
    <div class="relative shadow-md sm:rounded-lg w-full">
        <div class="container flex  align-start place-items-start flex-col">
            <h2 class=" text-black text-center font-bold gap-3 pb-2">Route Genrator <span class="text-red-500">DANGER
                    ZONE</span></h2>
                    <x-search-component wrapperClass="w-4/12 ms-4 my-2" name="Search" inputClass="admin__routes-search"
                    placeholder="Filter users by email" />
            <a href="{{ route('admin.routes.store') }}"
                onclick="return confirm('Are you shure you want to generate new routes?')"
                class="btn rounded bg-red-800 px-4 py-2 hover:bg-red-900 hover:cursor text-white w-30">Generate Route
                Names</a>
        </div>
        @foreach ($route_groups as $group => $routes)
            <form action="" method="PUT">
                @csrf
                @method('PUT')
                <div class="container py-1 " :class="{ 'block': open, 'hidden': !open }">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6 w-3/12">
                                    {{ $group }} | Route name
                                </th>
                                <th scope="col" class="py-3 px-6 w-8/12">
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
                                        <input type=text name="route_name" value="{{ $route->route_name }}" readonly>
                                    </th>
                                    <td class="py-4 px-6">
                                        <input type="hidden" class="permission__delete-container"
                                            name="delete_route_names" value="">
                                        @foreach ($route->permissions as $permission)
                                            <div class="permission flex gap-3">
                                                <div
                                                    class="permission__route-name border bg-green-50 border-gray-400 rounded-xl px-2.5 py-2.5">
                                                    <span
                                                        class="permission__item-text cursor-default">{{ $permission->name }}</span>
                                                    <span
                                                        class="permission__item-button btn text-red-700 font-bold cursor-pointer">&#x2715;</span>
                                                </div>
                                                <div class="permission__create flex gap-2">
                                                    <input type="text" name="permission[]"
                                                        class="permission__create-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Permission name |ex. edit">
                                                </div>
                                            </div>
                                        @endforeach

                                    </td>
                                    <td class="py-4 px-6">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 px-4 py-2 text-white rounded-md">Save</button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        @endforeach
    </div>

</x-admin-layout>
