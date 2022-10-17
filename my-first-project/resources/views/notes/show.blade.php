<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-200"></div>
                {{ session('success') }}
            @endif
            
            <div class="flex">
                <p class="opacity-70">
                    <strong>Created:</strong> {{ $note->created_at->diffForHumans() }}
                </p>
                <p class="opacity-70 ml-4">
                    <strong>Updated:</strong> {{ $note->updated_at->diffForHumans() }}
                </p>
                <a href="{{ route('notes.edit', $note) }}" class="btn-link ml-4">Edit Note</a>
                <form action="{{ route('notes.destroy', $note) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4"
                        onclick="return confirm('Are you sure you want to delete this note?')">Delete Note</button>
                </form>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <h2 class="font-bold text-4x1">
                    {{ $note->title }}
                </h2>
                <p class="mt-6 whitespace-pre-wrap">
                    {{ $note->text }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
