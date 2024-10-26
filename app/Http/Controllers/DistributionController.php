<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use App\Models\Distribution;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class DistributionController extends Controller
{
    // Display the distribution history with search functionality
    public function index(Request $request)
    {
        $query = Waste::whereHas('distributions', function($query) {
            $query->where('is_archived', false); // Filtrer pour exclure les distributions archivées
        });
    
        // Recherche par catégorie de déchet
        if ($request->filled('search')) {
            $query->where('category', 'like', '%' . $request->search . '%');
        }
    
        // Tri par colonne
        if ($request->filled('sort_by')) {
            $sortDirection = $request->sortDirection === 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort_by, $sortDirection);
        } else {
            // Tri par défaut par date de création
            $query->orderBy('created_at', 'desc');
        }
    
        $wastes = $query->paginate(10); // Pagination
    
        return view('BackOffice.Distributions.index', compact('wastes'));
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

    // Export distributions as a PDF
    public function export(Request $request)
    {
        $query = Waste::whereHas('distributions', function($query) {
            $query->where('is_archived', false); // Exclure les distributions archivées
        });

        // Recherche et tri identiques à l'index
        if ($request->filled('search')) {
            $query->where('category', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort_by')) {
            $sortDirection = $request->sortDirection === 'desc' ? 'desc' : 'asc';
            $query->orderBy($request->sort_by, $sortDirection);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $wastes = $query->get();

        // Génération du PDF
        $pdf = PDF::loadView('distributions.pdf', compact('wastes'));

        return $pdf->download('historique_distributions.pdf');
    }

    public function showArchived()
    {
        // Récupérer les distributions archivées avec pagination
        $archivedDistributions = Distribution::where('is_archived', true)->paginate(10);

        // Retourner la vue 'archived' avec les données
        return view('BackOffice.Distributions.archived', compact('archivedDistributions'));
    }

    // Méthode d'archivage d'une distribution
    public function archive($id)
    {
        $distribution = Distribution::findOrFail($id);
        $distribution->is_archived = true; // Archiver la distribution
        $distribution->save();

        return redirect()->back()->with('success', 'Distribution archivée avec succès.');
    }

    // Méthode de désarchivage d'une distribution
    public function unarchive($id)
    {
        $distribution = Distribution::findOrFail($id);
        $distribution->is_archived = false; // Désarchiver la distribution
        $distribution->save();

        return redirect()->back()->with('success', 'Distribution désarchivée avec succès.');
    }
}
