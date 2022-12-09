<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Block') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.blocks.update', $block) }}" method="POST" enctype="multipart/form-data">
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

                @error('block_image')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="Texturepacks">Texture Packs</label>
                    <select name="texture_id">
                        @foreach ($Texturepacks as $texturepack)
                            <option value="{{ $texturepack->id }}" {{ (old('texture_id') == $texturepack->id) ? "selected" : ""}}>
                            {{ $texturepack->name }}
                            </option>
                        @endforeach
                    </select>
               </div>

               <div class="form-group">
                    <label for="developers"><strong>Developers</strong> <br> </label>
                    @foreach ($developers as $developer)
                        <input type="checkbox", value="{{ $developer->id }}" name="developers[]">
                        {{ $developer->name }}

                    @endforeach
                </div>

                <br>
                
                <button class="mt-2">Update Block</button>
            </form>
        </div>
    </div>
</x-app-layout>