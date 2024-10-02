<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-8 mb-8">
        <h1 class="text-2xl font-bold mb-6">Modifier Feedback</h1>
        <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Spécifie la méthode PUT -->
            
            <!-- Champ nom d'utilisateur -->
            <div class="form-group mb-4">
                <label for="username" class="block font-semibold mb-2">Nom d'utilisateur</label>
                <input type="text" name="username" class="form-control w-full p-2 border rounded" value="{{ $feedback->username }}" required>
            </div>

            <!-- Champ message -->
            <div class="form-group mb-6">
                <label for="message" class="block font-semibold mb-2">Message</label>
                <textarea name="message" class="form-control w-full p-2 border rounded" required>{{ $feedback->message }}</textarea>
            </div>

            <!-- Bouton de mise à jour -->
            <button type="submit" class="btn btn-success bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Mettre à jour</button>
        </form>
    </div>
</x-app-layout>

