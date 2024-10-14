<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAgence;
use App\Models\RecyclingCenter;
use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    // Fonction pour afficher la liste des déchets
    public function index()
    {
        // Récupérer la liste des déchets
        $wastes = Waste::all();

        // Récupérer les agences de livraison et les centres de recyclage disponibles
        $deliveryAgencies = DeliveryAgence::all();
        $recyclingCenters = RecyclingCenter::all();

        // Retourner la vue avec les données
        return view('BackOffice.wastes.index', compact('wastes', 'deliveryAgencies', 'recyclingCenters'));
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
    
    

public function showDistributionHistory($id)
{
    // Récupérer le déchet sélectionné
    $waste = Waste::findOrFail($id);

    // Récupérer l'historique des distributions
    $distributions = $waste->distributions()->orderBy('created_at', 'desc')->get();

    // Retourner la vue avec les distributions
    return view('BackOffice.wastes.distribution_history', compact('waste', 'distributions'));
}

public function create()
{
    $depotCenters = DepotCenter::all(); // Fetch all depot centers
    return view('wastes.create', compact('depotCenters')); // Pass depot centers to the view
}

public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'quantity' => 'required|integer|min:1',
        'category' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maximum 2MB
        'depot_center_id' => 'required|exists:depot_centers,id', // Validate depot center
    ]);

    // Handle the image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('waste_images', 'public');
    }

    // Create the waste record
    Waste::create([
        'quantity' => $request->input('quantity'),
        'category' => $request->input('category'),
        'image' => $imagePath,
        'depot_center_id' => $request->input('depot_center_id'), // Add depot center
    ]);

    return redirect()->route('wastes.index')->with('success', 'Déchet ajouté avec succès !');
}

}




