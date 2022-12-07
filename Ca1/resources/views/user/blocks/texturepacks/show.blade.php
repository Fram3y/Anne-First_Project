<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Texture Packs') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
                <h2 class="font-bold text-2x1">
                    {{ $Texturepack->name }}
                </h2>
                
            </div>
            <span class="block mt-4 text-sm opacity-70">Last updated {{ $block->updated_at->diffForHumans() }}</span>
        </div>
        
    </div>
</x-app-layout>