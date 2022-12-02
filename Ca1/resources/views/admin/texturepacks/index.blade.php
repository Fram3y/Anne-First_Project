<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Texture Packs') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
            <a href="{{ route('admin.blocks.create') }}">+ New Pack</a>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($Texturepacks as $packs)
            <a href="{{ route('admin.texturepacks.show', $packs) }}">
            <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
                <div>
                    <h2 class="font-bold text-2x1">
                        {{ $packs->name }}
                        <span class="block mt-4 text-sm opacity-70">Last updated {{ $packs->updated_at->diffForHumans() }}</span>
                    </h2>
                </div>
                
            </div>
            @empty
                <p>You have no blocks yet.</p>
            @endforelse

            {{-- {{ $packs->links() }} --}}
        </div>
        </a>
    </div>
</x-app-layout>