<form action="{{ route('sensibilisation.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Titre de l'article</label>
        <input type="text" name="title" id="title" value="{{ $article->title }}" required>
    </div>

    <div>
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" required>{{ $article->content }}</textarea>
    </div>

    @foreach($article->guides as $index => $guide)
        <div class="guide">
            <label for="guides[{{ $index }}][destination]">Destination</label>
            <input type="text" name="guides[{{ $index }}][destination]" value="{{ $guide->destination }}" required>

            <label for="guides[{{ $index }}][description]">Description</label>
            <textarea name="guides[{{ $index }}][description]" required>{{ $guide->description }}</textarea>
            
            <label for="image">Upload image</label>
            <input type="file" name="image">
            <x-cld-image public-id="{{ $guide->image_public_id }}" alt="{{$guide->name}}"></x-cld-image>
        </div>
    @endforeach

    <button type="submit">Mettre à jour l'article et les guides</button>
</form>
