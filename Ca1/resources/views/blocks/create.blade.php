<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        </div>

        {{-- loads a Post form with empty info to create a new block --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('blocks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input
                type="text" 
                name="title"
                field="title"
                placeholder="Title"
                class="w-full"
                autocomplete="off"
                :value="@old('title')">

                {{-- runs the validation part of the store function to make sure the database dosent have empty fields --}}
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

                {{-- runs the validation part of the store function to make sure the database dosent have empty fields --}}
                @error('block_image')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <br>
                
                {{-- runs the store function from the block controller --}}
                <button class="mt-2">Add Block</button>
            </form>
        </div>
    </div>
</x-app-layout>