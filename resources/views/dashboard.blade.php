<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="space-y-4">
    <a href="{{ route('destinations.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
    <h3 class="font-semibold text-lg">Module Destination</h3>
    <p>Description du module destination.</p>
</a>
<a href="{{ route('voyages.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
    <h3 class="font-semibold text-lg">Module Voyage</h3>
    <p>Description du module voyage.</p>
</a>

    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
