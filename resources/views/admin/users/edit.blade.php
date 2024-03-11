<x-admin-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-md mx-4">
            <form method="post" action="{{ route('admin.users.update.data', $user->id) }}"
                class="space-y-6
            bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                @method('patch')
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                        required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <button type="submit"
                    class="btn px-4 py-2 bg-blue-500 rounded hover:bg-blue-700 text-white">Update</button>
            </form>
        </div>
        <div class="w-full max-w-md mx-4">
            <form method="POST" action="{{ route('admin.users.update', $user) }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT')
                @csrf
                <div class="mb-4">

                    <h4 class="text-black font-bold pb-2">Select roles to add</h4>
                    @foreach ($roles as $role)
                        <div class="checkbox__wrapper py-1">
                            @php
                                $checked = $user->roles->contains('name', $role->name) ? 'checked' : '';
                            @endphp
                            <input name="roles[]" type="checkbox" {{ $checked }} value="{{ $role->name }}">
                            <label>{{ $role->name }}</label>
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
