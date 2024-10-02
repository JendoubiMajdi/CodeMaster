
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('sensibilisation.update', $article->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titre de l'article</label>
                <input type="text" name="title" id="title" value="{{ $article->title }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Contenu de l'article</label>
                <textarea name="content" id="content" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $article->content }}</textarea>
            </div>
            @foreach($article->guides as $index => $guide)
    <div class="guide space-y-2">
        <label for="guides[{{ $index }}][destination]" class="block text-sm font-medium text-gray-700">Destination</label>
        <input type="text" name="guides[{{ $index }}][destination]" value="{{ $guide->destination }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>

        <label for="guides[{{ $index }}][description]" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="guides[{{ $index }}][description]" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $guide->description }}</textarea>

        <label for="guides[{{ $index }}][image]" class="block text-sm font-medium text-gray-700">Upload image</label>
        <input type="file" name="guides[{{ $index }}][image]" class="mt-1 block w-full text-sm text-gray-500">
        
        <!-- Show current image if it exists -->
        @if($guide->image_public_id)
            <x-cld-image public-id="{{ $guide->image_public_id }}" alt="{{ $guide->name }}" class="mt-2"></x-cld-image>
        @endif

        <!-- Hidden fields for keeping the old image data -->
        <input type="hidden" name="guides[{{ $index }}][image_url]" value="{{ $guide->image_url }}">
        <input type="hidden" name="guides[{{ $index }}][image_public_id]" value="{{ $guide->image_public_id }}">
    </div>
@endforeach


            <div class="text-center">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Mettre à jour l'article et les guides</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>