@section('vite_header')
    @vite('resources/js/admin/permission/edit.js')
@endsection
<x-admin-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-xs">
            <form method="POST" action="{{ route('admin.permission.update', $permission) }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT') @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="permissions">
                        Permission
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="permissions" type="text" placeholder="Permissions" name="name"
                        value="{{ $permission->name }}">
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

            <form method="POST" action="{{ route('admin.permissions.role', $permission) }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <x-search-component wrapperClass="inline w-4/12 ms-4" name="Search" inputClass="admin__permission-roles" placeholder='Filter roles' />
                <div class="mb-4 mt-2 checkbox__container">
                    <div class="container checkbox__wrapper">
                        @foreach ($roles as $role)
                            @php
                                $selected = $permission->roles->contains('name', $role->name) ? 'checked' : '';
                            @endphp
                            <div class="checkbox__inner-container">
                                <input type="checkbox" name="role[]" id="checkbox__{{ $role->id }}"
                                    {{ $selected }} class="checkbox__child" value="{{ $role->name }}">
                                <label for="checkbox__{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
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
