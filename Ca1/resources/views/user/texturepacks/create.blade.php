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
            <form action="{{ route('admin.texturepacks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input
                type="text" 
                name="name"
                field="name"
                placeholder="Name"
                class="w-full"
                autocomplete="off"
                :value="@old('name')">

                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <button class="mt-2">Add Pack</button>
            </form>
        </div>
    </div>
</x-app-layout>