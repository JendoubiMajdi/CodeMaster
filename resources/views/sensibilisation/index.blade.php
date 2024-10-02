<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Formulaire d'ajout d'un article -->
    <div class="min-h-screen flex items-center justify-center ">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">Ajouter un article</h2>

            <form action="{{ route('sensibilisation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="title" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Contenu</label>
                    <textarea name="content" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg"></textarea>
                </div>

                <div id="guides" class="mb-6">
                    <h4 class="text-lg font-semibold mb-4">Guides</h4>
                    <!-- Le reste du formulaire pour les guides -->
                </div>

                <div class="flex justify-between">
                    <button type="button" onclick="addGuide()" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Ajouter un guide
                    </button>

                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Ajouter l'article
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Affichage SweetAlert si l'ajout est réussi -->
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Succès!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif



    <!-- Articles du Module Sensibilisation -->
    <div class="bg-white p-8 max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Articles du Module Sensibilisation</h1>

    <!-- Liste des articles -->
    <h2 class="text-xl font-semibold mb-6">Liste des articles</h2>
    
    @foreach($articles as $article)
    <div class="mb-8 border-b pb-8">
        <div class="text-center">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                {{ $article->title }}
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                {{ $article->content }}
            </p>
        </div>

        <h4 class="text-lg font-semibold mt-6 mb-4">Guides :</h4>

        <ul>
            @foreach($article->guides as $guide)
            <section class="bg-white dark:bg-gray-900 mb-8">
                <div class="grid max-w-screen-xl px-4 pt-10 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12 lg:pt-10">
                    <div class="mr-auto place-self-center lg:col-span-7">
                        <h1 class="max-w-2xl mb-4 text-3xl font-extrabold leading-none tracking-tight md:text-4xl xl:text-5xl dark:text-white">{{ $guide->destination }}</h1>
                        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{{ $guide->description }}</p>
                    </div>
                    <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                        <x-cld-image public-id="{{ $guide->image_public_id }}" alt="{{$guide->name}}" width="80" height="80"></x-cld-image>
                    </div>                
                </div>
            </section>
            @endforeach
        </ul>

        <!-- Lien pour modifier l'article -->
        <a href="{{ route('sensibilisation.edit', $article->id) }}" 
           class="inline-block px-4 py-2 bg-orange-500 text-white font-semibold rounded hover:bg-orange-600 transition-colors duration-300">
           Modifier
        </a>

        <!-- Formulaire pour supprimer l'article -->
        <form action="{{ route('sensibilisation.destroy', $article->id) }}" method="POST" class="inline-block ml-4">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 transition-colors duration-300"
                    onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                Supprimer
            </button>
        </form>
    </div>
    @endforeach
</div>




<script>
    let guideIndex = 1;
    function addGuide() {
        const guidesDiv = document.getElementById('guides');
        const newGuide = `
        <div class="guide mb-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
    <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
    <input type="text" name="guides[${guideIndex}][destination]" required
           class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
    
    <label for="description" class="block text-sm font-medium text-gray-700 mt-4">Description</label>
    <textarea name="guides[${guideIndex}][description]" required
              class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"></textarea>

    <label for="image" class="block text-sm font-medium text-gray-700 mt-4">Upload image</label>
    <input type="file" name="guides[${guideIndex}][image]" required 
           class="block w-full p-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">

    <button type="button" onclick="removeGuide(this)" 
            class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
        Supprimer ce guide
    </button>
</div>

        `;
        guidesDiv.insertAdjacentHTML('beforeend', newGuide);
        guideIndex++;
    }

    function removeGuide(button) {
        button.parentElement.remove();
    }
</script>

</x-app-layout>