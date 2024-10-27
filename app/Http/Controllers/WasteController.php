<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\DepotCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryAgence;
use App\Models\RecyclingCenter;

class WasteController extends Controller
{
    // Afficher tous les déchets
    public function index(Request $request)
    {
        // Récupérer les déchets de la base de données
        $query = Waste::query();
        $deliveryAgencies = DeliveryAgence::all();
        $recyclingCenters = RecyclingCenter::all();
        // Si une recherche est effectuée, appliquez le filtre
        if ($request->has('search')) {
            $query->where('category', 'like', '%' . $request->search . '%')
                   ->orWhere('collection_location', 'like', '%' . $request->search . '%');
        }


        // Gestion du tri
    $sortBy = $request->get('sort_by', 'id'); // Attribut par défaut pour le tri
    $sortDirection = $request->get('sort_direction', 'asc'); // Direction par défaut (asc ou desc)

    // Vérifier si l'attribut de tri est valide
    if (in_array($sortBy, ['id', 'quantity', 'collection_date', 'category'])) {
        $query->orderBy($sortBy, $sortDirection);
    } else {
        // Si l'attribut de tri n'est pas valide, triez par défaut par ID
        $query->orderBy('id', 'asc');
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
        $staticUserId =  Auth::id();

    
        // Validation des données entrantes
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quantity' => 'required|integer|min:1',
            // 'collection_date' => 'required|date',
            'collection_location' => 'required|string',
            'category' => 'required|in:papier,bois,plastique,verre,métal',
            'depot_id' => 'required|exists:depot_centers,id',
        ], [
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format : jpeg, png, jpg, ou gif.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            
            'quantity.required' => 'La quantité est obligatoire.',
            'quantity.integer' => 'La quantité doit être un nombre entier.',
        
            'collection_location.required' => 'Le lieu de collecte est obligatoire.',
            'collection_location.string' => 'Le lieu de collecte doit être une chaîne de caractères.',
        
            'category.required' => 'La catégorie est obligatoire.',
            'category.in' => 'La catégorie doit être l\'une des suivantes : papier, bois, plastique, verre, métal.',
        
            'depot_id.required' => 'Le centre de dépôt est obligatoire.',
            'depot_id.exists' => 'Le centre de dépôt sélectionné n\'existe pas.',
        ]);
    
        // Add static user_id
        $validatedData['user_id'] = $staticUserId;
        
        $validatedData['collection_date'] = now();
        \Log::info('Collection date ajoutée', ['collection_date' => $validatedData['collection_date']]);
    
        $validatedData['image'] = $validatedData['image'] ?? 'default.jpg';


    // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
        // Create the waste entry
         $waste = Waste::create($validatedData);

         return redirect()->route('depot_center.index')
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
        // 'collection_date' => 'sometimes|required|date',
        'collection_location' => 'sometimes|required|string',
        'category' => 'sometimes|required|in:papier,bois,plastique,verre,métal',
        'depot_id' => 'sometimes|required|exists:depot_centers,id',
    ]);
    $validatedData['collection_date'] = now();
    \Log::info('Collection date ajoutée', ['collection_date' => $validatedData['collection_date']]);

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
            public function statistics(Request $request)
            {
                // Récupérer les statistiques de déchets par catégorie et par centre de dépôt
                $statistics = Waste::select('wastes.category', 'depot_centers.name as depot_name', \DB::raw('COUNT(*) as total'))
                    ->join('depot_centers', 'wastes.depot_id', '=', 'depot_centers.id')
                    ->groupBy('wastes.category', 'depot_centers.name')
                    ->get()
                    ->groupBy('depot_name'); // Regrouper par nom de centre de dépôt
            
                // Passer les statistiques à la vue
                return view('BackOffice.wastes.statistics', compact('statistics'));
            }
            
            




    // Afficher le formulaire de distribution
    public function showDistributionForm(Request $request)
    {
        $selectedWasteIds = $request->input('selected_wastes', []);
        $selectedWastes = Waste::whereIn('id', $selectedWasteIds)->get(); // Récupérez les déchets sélectionnés
        $deliveryAgencies = DeliveryAgence::all();
        $recyclingCenters = RecyclingCenter::all();

        return view('BackOffice.wastes.distribution_form', compact('selectedWastes', 'deliveryAgencies', 'recyclingCenters'));
    }

    // Traiter la distribution
    // app/Http/Controllers/WasteController.php

    public function distribute(Request $request)
    {
        // Validation des entrées
        $request->validate([
            'delivery_agency' => 'required|exists:delivery_agences,id',
            'recycling_center' => 'required|exists:recycling_centers,id',
            'waste_id' => 'required|exists:wastes,id', // Ensure you validate waste_id
        ]);
    
        // Récupérer le déchet à partir de l'ID passé dans la requête
        $wasteId = $request->input('waste_id');
        $waste = Waste::findOrFail($wasteId); // Use findOrFail for better error handling
    
        // Vérifier si le déchet a déjà été distribué
        if ($waste->isDistributed()) {
            return redirect()->route('wastes.index')->with('error', 'Ce déchet a déjà été distribué.');
        }
    
        // Créer la distribution pour le déchet
        $distribution = $waste->distribution()->create([
            'delivery_agence_id' => $request->input('delivery_agency'),
            'recycling_center_id' => $request->input('recycling_center'),
            'quantity_to_distribute' => $waste->quantity,
            'status' => 'pending',
            'waste_id' => $wasteId, // Include waste_id in the distribution
        ]);
    
        // Mettre à jour le statut de la distribution une fois qu'elle a été créée
        $distribution->status = 'completed'; // or keep as 'pending' based on your logic
        $distribution->save();
    
        return redirect()->route('wastes.index')->with('success', 'Distribution effectuée avec succès !');
    }

}