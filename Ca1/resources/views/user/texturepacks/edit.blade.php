<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Texture Pack') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.texturepacks.update', $Texturepack) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <input
                type="text" 
                name="name"
                field="name"
                placeholder="name"
                class="w-full"
                autocomplete="off"
                value="{{ $Texturepack->name }}">

                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
                
                <button class="mt-2">Update Pack</button>
            </form>
        </div>
    </div>
</x-app-layout>