<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-8 mb-8">
        <h1 class="text-2xl font-bold mb-6">Ajouter un Feedback</h1>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            
            <!-- Champ nom d'utilisateur -->
            <div class="form-group mb-4">
                <label for="username" class="block font-semibold mb-2">Nom d'utilisateur</label>
                <input type="text" name="username" class="form-control w-full p-2 border rounded" required>
            </div>

            <!-- Champ message -->
            <div class="form-group mb-6">
                <label for="message" class="block font-semibold mb-2">Message</label>
                <textarea name="message" class="form-control w-full p-2 border rounded" required></textarea>
            </div>

            <!-- Bouton Ajouter -->
            <button type="submit" class="btn btn-success bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Ajouter</button>
        </form>

        <!-- Message de succès -->
        @if(session('success'))
            <div class="alert alert-success mt-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div class="alert alert-danger mt-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>
