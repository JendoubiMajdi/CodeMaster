<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-8 mb-8">
        <h1 class="text-2xl font-bold mb-4">Feedback Détails</h1>
        <p class="mb-2"><strong>Nom d'utilisateur :</strong> {{ $feedback->username }}</p>
        <p class="mb-4"><strong>Message :</strong> {{ $feedback->message }}</p>
        <a href="{{ route('feedback.index') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
</x-app-layout>
