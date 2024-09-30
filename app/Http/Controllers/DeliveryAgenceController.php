<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAgence;
use Illuminate\Http\Request;

class DeliveryAgenceController extends Controller
{
   // Affiche la liste des agences de livraison
   public function index()
   {
       $agences = DeliveryAgence::all();  // Récupère toutes les agences
       return view('BackOffice.DeliveryAgence.index', compact('agences'));  // Renvoie à la vue index avec les données
   }



// Affiche la liste des agences de livraison dans le front-office
public function indexFrontend()
{
    $agences = DeliveryAgence::all();  // Récupère toutes les agences
    return view('FrontOffice.deliveryagence.index', compact('agences'));  // Renvoie à la vue du front-office
}

// Affiche une agence spécifique dans le front-office
public function showFrontend($id)
{
    $agence = DeliveryAgence::findOrFail($id);  // Trouve l'agence ou renvoie une erreur 404
    return view('FrontOffice.deliveryagence.show', compact('agence'));  // Affiche la vue des détails dans le front-office
}











   // Affiche le formulaire pour créer une nouvelle agence de livraison
   public function create()
   {
       return view('BackOffice.DeliveryAgence.create');  // Affiche la vue du formulaire de création
   }

   // Enregistre une nouvelle agence de livraison dans la base de données
   public function store(Request $request)
   {
       // Validation des données
       $validated = $request->validate([
           'name' => 'required|string|max:255',
           'address' => 'required|string|max:255',
           'phoneNumber' => 'required|integer',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048', // Validation de l'image
           'opening_hours' => 'required',
           'closing_hours' => 'required',
       ]);
 // Sauvegarder l'image sur le serveur
 if ($request->hasFile('image')) {
    // Déplace le fichier image vers le dossier public
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images/agencies'), $imageName);
    
    // Assignation du chemin à l'attribut 'image'
    $validated['image'] = 'images/agencies/' . $imageName; // Assurez-vous que ceci est correct
}

       // Création de la nouvelle agence
       DeliveryAgence::create($validated);

       // Redirection avec message de succès
       return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison créée avec succès.');
   }

   // Affiche une agence de livraison spécifique
   public function show($id)
   {
       $agence = DeliveryAgence::findOrFail($id);  // Trouve l'agence ou renvoie une erreur 404
       return view('BackOffice.DeliveryAgence.show', compact('agence'));  // Affiche la vue des détails de l'agence
   }

   // Affiche le formulaire pour éditer une agence de livraison
   public function edit($id)
   {
       $agence = DeliveryAgence::findOrFail($id);  // Trouve l'agence ou renvoie une erreur 404
       return view('BackOffice.DeliveryAgence.edit', compact('agence'));  // Affiche la vue du formulaire d'édition
   }

   // Met à jour les informations d'une agence de livraison
 // Met à jour les informations d'une agence de livraison
public function update(Request $request, $id)
{
    // Validation des données
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phoneNumber' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048', // Change ici pour permettre le téléchargement d'image
        'opening_hours' => 'required',
        'closing_hours' => 'required',
    ]);

    // Mise à jour de l'agence
    $agence = DeliveryAgence::findOrFail($id);
    
    // Vérifie si une nouvelle image est téléchargée
    if ($request->hasFile('image')) {
        // Déplace le fichier image vers le dossier public
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/agencies'), $imageName);
        
        // Ajoute le chemin de la nouvelle image aux données validées
        $validated['image'] = 'images/agencies/' . $imageName;
    } else {
        // Si aucune nouvelle image n'est téléchargée, garde l'ancienne
        $validated['image'] = $agence->image; // Garde l'image existante
    }

    // Met à jour les informations de l'agence
    $agence->update($validated);

    // Redirection avec message de succès
    return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison mise à jour avec succès.');
}


   // Supprime une agence de livraison
   public function destroy($id)
   {
       $agence = DeliveryAgence::findOrFail($id);  // Trouve l'agence ou renvoie une erreur 404
       $agence->delete();  // Supprime l'agence

       // Redirection avec message de succès
       return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison supprimée avec succès.');
   }
}
