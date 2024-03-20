@section('vite_header')
    @vite('resources/js/admin/users/edit.js')
@endsection
<x-admin-layout>
    <div class="flex justify-center">
        <div class="w-full max-w-md mx-4">
            <form method="post" action="{{ route('admin.users.store') }}"
                class="space-y-6
            bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <!-- user name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <!-- email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <button type="submit"
                    class="btn px-4 py-2 bg-blue-500 rounded hover:bg-blue-700 text-white">Create</button>
            </form>
        </div>
        <div class="w-full max-w-md mx-4">
            {{-- here needs to be implemented somehow...
            <form method="POST" action="{{ route('admin.users.update','id__id') }}"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <x-search-component wrapperClass="inline w-4/12 ms-4" name="Search" inputClass="admin__users-roles"
                    placeholder="Filter roles" />
                    <h4 class="text-black font-bold py-2">Select roles to add</h4>
                    @foreach ($roles as $role)
                        <div class="checkbox__wrapper py-1">
                            @php
                                $checked = $user->roles->contains('name', $role->name) ? 'checked' : '';
                            @endphp
                            <input name="roles[]" type="checkbox" {{ $checked }} value="{{ $role->name }}" class="get-data">
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
            </form> --}}
            @error('name')
                <p class="text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>
</x-admin-layout>
