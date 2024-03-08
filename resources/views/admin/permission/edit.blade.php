<x-admin-layout>
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
</x-admin-layout>
