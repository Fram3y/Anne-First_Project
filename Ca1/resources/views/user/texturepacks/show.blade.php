<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blocks') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
            <h2 class="font-bold text-2x1">
                {{ $block->title }}
            </h2>
            <h3>
                {{ $Texturepacks->name }}
            </h3>
            @foreach ($block->developers as $developer)
                <h3>
                    <td class="font-bold">Developer</td>
                    <td>{{ $developer->name }}</td>
                </h3>
            @endforeach
            
            
            <img src="{{ asset('storage/images/' . $block->block_image) }}" width="150">
            
        </div>
        
    </div>
</x-app-layout>