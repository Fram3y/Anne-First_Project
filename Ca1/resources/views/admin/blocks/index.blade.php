<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <a href="{{ route('admin.blocks.create') }}">+ New Block</a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($blocks as $block)
            <a href="{{ route('admin.blocks.show', $block) }}">
            <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
                <div>
                  @forelse ($Texturepacks as $pack)
                      @if ($block->texture_id == $pack->id)
                        {{ $pack->name }} 
                    @endif
                  @empty 
                  @endforelse
                    <h2 class="font-bold text-2x1">
                        {{ $block->title }}
                        <span class="block mt-4 text-sm opacity-70">Last updated {{ $block->updated_at->diffForHumans() }}</span>
                    </h2>
                </div>
                
                <img src="{{ asset('storage/images/' . $block->block_image) }}" width="150">
                
            </div>
            @empty
                <p>You have no blocks yet.</p>
            @endforelse

            {{ $blocks->links() }}
        </div>
        </a>
    </div>
</x-app-layout>