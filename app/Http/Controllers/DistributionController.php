<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    // Display the distribution history with search functionality
    public function index(Request $request)
    {
        // Récupérer le terme de recherche et les paramètres de tri
        $search = $request->input('search');
        $sortBy = $request->input('sortBy', 'created_at'); // Trier par défaut par la date
        $sortDirection = $request->input('sortDirection', 'desc'); // Ordre décroissant par défaut
    
        // Requête pour les déchets et leurs distributions avec filtre de recherche et tri
        $wastes = Waste::with(['distributions.recyclingCenter', 'distributions.deliveryAgence'])
            ->when($search, function ($query, $search) {
                $query->where('category', 'like', "%{$search}%") // Filtre sur les déchets
                    ->orWhereHas('distributions.recyclingCenter', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%"); // Filtre sur les centres de recyclage
                    })
                    ->orWhereHas('distributions.deliveryAgence', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%"); // Filtre sur les agences de livraison
                    })
                    ->orWhereHas('distributions', function ($q) use ($search) {
                        $q->where('status', 'like', "%{$search}%"); // Filtre sur le statut
                    });
            })
            ->with(['distributions' => function ($query) use ($sortBy, $sortDirection) {
                $query->orderBy($sortBy, $sortDirection); // Appliquer le tri sur les distributions
            }])
            ->paginate(10);
    
        return view('BackOffice.Distributions.index', compact('wastes', 'search', 'sortBy', 'sortDirection'));
    }
    

    // Form for creating a new distribution
    public function create()
    {
        $wastes = Waste::all();
        return view('distributions.create', compact('wastes'));
    }

    // Store a new distribution record
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'delivery_agency_id' => 'required|exists:delivery_agencies,id',
            'recycling_center_id' => 'required|exists:recycling_centers,id',
            'waste_ids' => 'required|array',
            'waste_ids.*' => 'exists:wastes,id',
        ]);

        // Loop through each waste ID and create a distribution record
        foreach ($validatedData['waste_ids'] as $wasteId) {
            Distribution::create([
                'quantity_to_distribute' => 1, // Set default quantity or modify as needed
                'status' => 'Pending', // Set initial status to Pending
                'delivery_agency_id' => $validatedData['delivery_agency_id'],
                'recycling_center_id' => $validatedData['recycling_center_id'],
                'waste_id' => $wasteId,
            ]);
        }

        return redirect()->route('distributions.index')->with('success', 'Distributions créées avec succès.');
    }

    
}
