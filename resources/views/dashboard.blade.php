<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Module Hôtel -->
                <div>
                    <a href="{{ route('hotel.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
                        <h3 class="font-semibold text-lg">Module Hôtel</h3>
                        <p>Description du module hôtel.</p>
                    </a>
                </div>

                <!-- Module Réservation -->
                <div>
                    <a href="{{ route('chambres.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
                        <h3 class="font-semibold text-lg">Module chambre</h3>
                        <p>Description du module chambre.</p>
                    </a>
                </div>

                <!-- Module Sensibilisation -->
                <div>
                    <a href="{{ route('sensibilisation.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
                        <h3 class="font-semibold text-lg">Module  éducation et Sensibilisation</h3>
                        <p>Description du module sensibilisation.</p>
                    </a>
                </div>

                <!-- Module Itinéraire -->
                <div>
                <a href="{{ route('destinations.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
    <h3 class="font-semibold text-lg">Module Destination</h3>
    <p>Description du module destination.</p>
</a>
                </div>

            
                <div>
                <a href="{{ route('voyages.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
    <h3 class="font-semibold text-lg">Module Voyage</h3>
    <p>Description du module voyage.</p>
</a>
                </div>

                <!-- Module Communauté -->
             
                <div>
                    <a href="{{ route('transports.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
                        <h3 class="font-semibold text-lg">Module transports</h3>
                        <p>Description du module transports.</p>
                    </a>
                </div>
                <div>
                    <a href="{{ route('feedback.index') }}" class="block p-6 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition border border-gray-700">
                        <h3 class="font-semibold text-lg">Module feedback</h3>
                        <p>Description du module feedback.</p>
                    </a>
                </div>
              
            </div>
        </div>
    </div>
</x-app-layout>