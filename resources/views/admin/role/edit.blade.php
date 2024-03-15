@section('vite_header')
    @vite('resources/js/admin/role/edit.js')
@endsection
<x-admin-layout>
    <div class="w-full flex">
        <div class="w-full max-w-md mx-4">
            <form method="POST" action="{{ route('admin.role.update', $role) }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT') @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="roles">
                        Role
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="roles" type="text" placeholder="roles" name="name" value="{{ $role->name }}">
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
            @error('name')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="w-full max-w-xs mx-4">

            <form method="POST" action="{{ route('admin.role.permissions', $role) }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="pb-3">
                    <label for="input-group-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="input-group-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600
                            dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                            admin__role-permission"
                            placeholder="Filter permissions">
                    </div>
                </div>
                <div class="mb-4 checkbox__container">
                    @foreach ($permissions_grouped as $group_name => $permissions)
                        <div class="container checkbox__wrapper">
                            @if ($loop->index !== 0)
                                <span class="py-2 block"></span>
                            @endif
                            <div class="checkbox__inner-container">
                                <input type="checkbox" class="checkbox__parent border-2 ">
                                <h4 class="text-black font-bold inline">
                                    {{ ucfirst($group_name) }}</h4>
                            </div>
                            @foreach ($permissions as $permission)
                                @php
                                    $selected = $role->permissions->contains('name', $permission->name)
                                        ? 'checked'
                                        : '';
                                @endphp
                                <div class="checkbox__inner-container">
                                    <input type="checkbox" name="permission[]" id="checkbox[]" {{ $selected }}
                                        class="checkbox__child" value="{{ $permission->name }}">
                                    <label for="checkbox[]">{{ $permission->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Save
                    </button>
                </div>
            </form>
            @error('name')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>
</x-admin-layout>
