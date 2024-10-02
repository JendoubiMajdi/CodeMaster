<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mt-8 mb-8">
        <h1 class="text-2xl font-bold mb-4">Liste des Feedbacks</h1>
        <a href="{{ route('feedback.create') }}" class="btn btn-primary mb-6">Ajouter un Feedback</a>
        <table class="table w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->username }}</td>
                        <td>{{ $feedback->message }}</td>
                        <td class="space-x-2">
                            <a href="{{ route('feedback.show', $feedback->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('feedback.edit', $feedback->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
