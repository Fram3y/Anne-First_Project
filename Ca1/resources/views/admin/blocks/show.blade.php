<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex">
                <div>
                    <a href="{{ route('admin.blocks.edit', $block) }}" class="btn-link ml-auto">Edit Block</a>
                </div>
    
                <div>
                    <form action="{{ route('admin.blocks.destroy', $block) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you wish to delete this block?')">Delete Block</button>
                        </form>    
                </div>
            </div>
        
            <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
                <h2 class="font-bold text-2x1">
                    {{ $block->title }}
                </h2>
                
                <img src="{{ asset('storage/images/' . $block->block_image) }}" width="150">
                
            </div>
            <span class="block mt-4 text-sm opacity-70">Last updated {{ $block->updated_at->diffForHumans() }}</span>
        </div>
        
    </div>
</x-app-layout>