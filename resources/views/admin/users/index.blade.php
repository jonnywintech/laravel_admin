<x-admin-layout>
    <div class="w-full h-auto overflow-x-auto sm:rounded-lg">
        <div class="flex flex-end pb-4">
            <a href="{{ route('admin.permission.create') }}"
                class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded">Create</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }}
                            @endforeach
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="btn bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded d-inline mx-1">Edit</a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this user?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        class="btn bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded mx-1">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
