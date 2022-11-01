<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Block') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        </div>

        {{-- loads a post form to update block info by uuid --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('blocks.update', $block) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf

                <input
                type="text" 
                name="title"
                field="title"
                placeholder="Title"
                class="w-full"
                autocomplete="off"
                value="{{ $block->title }}">

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
                value="{{ asset('storage/images/' . $block->block_image) }}"
                >

                {{-- runs the validation part of the store function to make sure the database dosent have empty fields --}}
                @error('block_image')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <br>
                
                {{-- runs the update function from the block controller --}}
                <button class="mt-2">Update Block</button>
            </form>
        </div>
    </div>
</x-app-layout>