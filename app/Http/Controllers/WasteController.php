<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\DepotCenter;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    // Afficher tous les déchets
    public function index(Request $request)
    {
        // Récupérer les déchets de la base de données
        $query = Waste::query();

        // Si une recherche est effectuée, appliquez le filtre
        if ($request->has('search')) {
            $query->where('category', 'like', '%' . $request->search . '%')
                   ->orWhere('collection_location', 'like', '%' . $request->search . '%');
        }

        // Récupérer tous les déchets avec pagination
        $wastes= $query->paginate(6); // Changez le nombre selon vos besoins

        // Passer les déchets à la vue
        return view('BackOffice.wastes.index', compact('wastes'));
    }

    public function create(Request $request)
    {
        // Retrieve centre_id from the query string
        $depotId = $request->query('centre_id');
    
        // Pass the depot_id to the view
        return view('FrontOffice.wastes.create', compact('depotId'));
    }
    
    
    // Créer un nouveau déchet
    public function store(Request $request)
    {
        \Log::info('Store request data:', $request->all());
        // Set a static user ID for now (replace '1' with the actual user ID)
        $staticUserId = 1;
    
        // Validation des données entrantes
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required|integer',
            'collection_date' => 'required|date',
            'collection_location' => 'required|string',
            'category' => 'required|in:papier,bois,plastique,verre,métal',
            'depot_id' => 'required|exists:depot_centers,id',
        ]);
    
        // Add static user_id
        $validatedData['user_id'] = $staticUserId;
    // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
        // Create the waste entry
         $waste = Waste::create($validatedData);

         return redirect()->route('wastes.create')
         ->with('success', 'Waste created successfully!'); 

    }
    
    

    // Afficher un déchet spécifique
    public function show($id)
    {
        $waste = Waste::findOrFail($id); // Trouver le déchet par ID
        return response()->json($waste); // Retourner le déchet en format JSON
    }

    public function getWastesByDepotCenter(Request $request, $depotId)
    {
        // Rechercher le centre de dépôt
        $depotCenter = DepotCenter::find($depotId);
    
        // Construire la requête pour récupérer les déchets en fonction du depot_id
        $query = Waste::where('depot_id', $depotId);
    
        // Si une recherche est effectuée, appliquez les filtres de recherche
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('category', 'like', '%' . $searchTerm . '%')
                  ->orWhere('collection_location', 'like', '%' . $searchTerm . '%');
            });
        }
    
        // Paginer les résultats de la recherche
        $wastes = $query->paginate(6); // Ajustez la pagination si nécessaire
    
        // Retourner la vue avec la liste des déchets pour le dépôt spécifié
        return view('FrontOffice.wastes.byDepot', compact('wastes', 'depotCenter'));
    }
    
    // Mettre à jour un déchet
    // Afficher le formulaire d'édition pour un déchet spécifique
public function edit($id)
{
    $waste = Waste::findOrFail($id); // Trouver le déchet par ID
    return view('FrontOffice.wastes.edit', compact('waste')); // Retourner la vue d'édition
}

// Mettre à jour un déchet
public function update(Request $request, $id)
{
    $waste = Waste::findOrFail($id); // Trouver le déchet par ID

    // Validation des données
    $validatedData = $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'quantity' => 'sometimes|required|integer',
        'collection_date' => 'sometimes|required|date',
        'collection_location' => 'sometimes|required|string',
        'category' => 'sometimes|required|in:papier,bois,plastique,verre,métal',
        'depot_id' => 'sometimes|required|exists:depot_centers,id',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($waste->image) {
            \Storage::delete('images/' . $waste->image);
        }
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $validatedData['image'] = $imageName;
    }

    $waste->update($validatedData); // Mettre à jour le déchet

    return redirect()->route('wastes.byDepot', ['depotId' => $waste->depot_id]) 
        ->with('success', 'Waste updated successfully!'); // Redirect with success message
}


    // Supprimer un déchet
    public function destroy($id)
    {
        $waste = Waste::findOrFail($id); // Trouver le déchet par ID
        $waste->delete(); // Supprimer le déchet
  return redirect()->route('depot_center.index') 
            ->with('success', 'Centre de dépôt supprimé avec succès.');     }
}
