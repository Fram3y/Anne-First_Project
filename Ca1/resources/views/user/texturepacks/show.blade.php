<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Texture Packs') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="flex justify-between mt-4 bg-white py-4 px-6 mx-auto shadow ml-4">
            <h3>
                {{ $Texturepack->name }}
            </h3>

        </div>

    </div>
</x-app-layout>
