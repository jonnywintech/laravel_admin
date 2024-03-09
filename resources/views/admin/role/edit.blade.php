<x-admin-layout>
    <div class="w-full max-w-xs mx-4">
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
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="roles">
                    Assign permission for role
                </label>
                <select name="permission[]" class="form-select" multiple>
                    <option disabled value="">Select permission to add</option>
                    @foreach ($permissions as $permission)
                        @php
                            $selected = $role->permissions->contains('name', $permission->name) ? 'selected' : '';
                        @endphp
                        <option {{ $selected }} value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
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
</x-admin-layout>
