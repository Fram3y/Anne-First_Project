<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($blocks as $block)
                <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
                    <h2>
                        {{ $block->title }}
                    </h2>
                    
                    <img src="{{ asset('storage/images/' . $block->block_image) }}" width="150">
                    
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>