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
    public function distribute(Request $request)
{
    // Validation des entrées pour s'assurer que tout est rempli
    $request->validate([
        'delivery_agency' => 'required|array',
        'recycling_center' => 'required|array',
    ]);

    // Boucle à travers les déchets envoyés dans la requête
    foreach ($request->delivery_agency as $wasteId => $agencyId) {
        $waste = Waste::find($wasteId);
        if ($waste && !$waste->isDistributed()) {
            // Créer la distribution pour chaque déchet
            $waste->distribution()->create([
                'delivery_agence_id' => $agencyId,
                'recycling_center_id' => $request->recycling_center[$wasteId],
                'quantity_to_distribute' => $waste->quantity,
                'status' => 'pending',
            ]);
        }
    }

    return redirect()->route('wastes.index')->with('success', 'Distribution effectuée avec succès !');
}

}
