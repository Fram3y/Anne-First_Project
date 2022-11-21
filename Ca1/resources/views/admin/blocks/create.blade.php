<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.blocks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input
                type="text" 
                name="title"
                field="title"
                placeholder="Title"
                class="w-full"
                autocomplete="off"
                :value="@old('title')">

                @error('title')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <br>

                <input 
                class="mt-2" 
                name="block_image" 
                field="block_image"
                type="file" 
                placeholder="Block"
                >

                @error('block_image')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <br>
                
                <button class="mt-2">Add Block</button>
            </form>
        </div>
    </div>
</x-app-layout>