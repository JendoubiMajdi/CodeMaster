<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class SensibilisationController extends Controller
{
    public function index()
{
    $articles = Article::with('guides')->get();
    return view('sensibilisation.index', compact('articles'));
}


public function store(Request $request) 
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'guides' => 'array', // Assurez-vous que les guides sont passés sous forme de tableau
        'guides.*.destination' => 'required|string',
        'guides.*.description' => 'required|string',
        'guides.*.image' => 'required|file|mimes:jpg,jpeg,png', // Validation pour chaque image
    ]);

    // Créer l'article
    $article = Article::create($request->only('title', 'content'));

    // Ajouter les guides liés à cet article
    foreach ($request->guides as $index => $guideData) {
        // Uploader l'image sur Cloudinary pour chaque guide
        if ($request->hasFile("guides.$index.image")) {
            $cloudinaryImage = $request->file("guides.$index.image")->storeOnCloudinary('guides');
            $guideData['image_url'] = $cloudinaryImage->getSecurePath();
            $guideData['image_public_id'] = $cloudinaryImage->getPublicId();
        }

        // Créer chaque guide associé à l'article
        $article->guides()->create($guideData);
    }

    return redirect()->route('sensibilisation.index')->with('success', 'Article et guides ajoutés avec succès');
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'sometimes|image|max:2048', // Validation de l'image si présente
        'guides' => 'nullable|array',
        'guides.*.destination' => 'required_with:guides|string',
        'guides.*.description' => 'required_with:guides|string',
    ]);

    // Trouver l'article existant
    $article = Article::findOrFail($id);

    // Si une nouvelle image est fournie, supprimer l'ancienne de Cloudinary
    if ($request->hasFile('image')) {
        // Vérifier s'il y a une ancienne image à supprimer
        if ($article->guides->isNotEmpty() && $article->guides->first()->image_public_id) {
            Cloudinary::destroy($article->guides->first()->image_public_id); // Supprimer l'image précédente
        }

        // Télécharger la nouvelle image sur Cloudinary
        $cloudinaryImage = $request->file('image')->storeOnCloudinary('guides');
        $url = $cloudinaryImage->getSecurePath();
        $public_id = $cloudinaryImage->getPublicId();
    }

    // Mettre à jour les détails de l'article
    $article->update($request->only('title', 'content'));

    // Supprimer les guides existants
    $article->guides()->delete();

    // Ajouter de nouveaux guides si soumis
    if ($request->filled('guides')) {
        foreach ($request->guides as $guideData) {
            // Si une nouvelle image a été téléchargée, l'utiliser
            if ($request->hasFile('image')) {
                $guideData['image_url'] = $url;
                $guideData['image_public_id'] = $public_id;
            } else {
                // Vérifier si l'article a des guides et si le premier guide a une image
                if ($article->guides->isNotEmpty() && $article->guides->first()->image_url !== null) {
                    $guideData['image_url'] = $article->guides->first()->image_url;
                    $guideData['image_public_id'] = $article->guides->first()->image_public_id;
                } else {
                    // Si aucun guide ou image n'existe, gérer l'absence d'image
                    $guideData['image_url'] = null; // ou une valeur par défaut
                    $guideData['image_public_id'] = null; // ou une valeur par défaut
                }
            }
            
            $article->guides()->create($guideData);
        }
    }

    return redirect()->route('sensibilisation.index', $article->id)->with('success', 'Article et guides mis à jour avec succès');
}


public function edit($id)
{
    $article = Article::with('guides')->findOrFail($id); // Récupérer l'article avec les guides associés
    return view('sensibilisation.edit', compact('article')); // Retourner la vue de modification
}
public function destroy($id)
{
    // Trouver l'article par son ID
    $article = Article::findOrFail($id);

    // Si l'article a des guides avec des images, les supprimer de Cloudinary
    if ($article->guides->isNotEmpty()) {
        foreach ($article->guides as $guide) {
            if ($guide->image_public_id) {
                Cloudinary::destroy($guide->image_public_id); // Supprimer les images associées
            }
        }
    }
    $article->guides()->delete();
    // Supprimer l'article (les guides seront supprimés en cascade)
    $article->delete();

    return redirect()->route('sensibilisation.index')->with('success', 'Article et guides supprimés avec succès');
}


}
