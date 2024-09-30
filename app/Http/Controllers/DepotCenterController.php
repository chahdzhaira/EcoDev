<?php

namespace App\Http\Controllers;

use App\Models\DepotCenter; // Change RecyclingCenter to DepotCenter
use Illuminate\Http\Request;

class DepotCenterController extends Controller
{
    public function index(Request $request)
    {
        // Prepare query
        $query = DepotCenter::query(); // Change RecyclingCenter to DepotCenter
    
        // Search functionality (if needed)
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%');
        }
    
    //     // Paginate results
    //     $depotCenters = $query->paginate(10); // Change recyclingCenters to depotCenters
    
    //     return view('BackOffice.Depot-Center.index', compact('depotCenters')); // Change recycling_centers to depot_centers
    // }




            // Pagination des résultats (5 éléments par page)
            $depotCenters = $query->paginate(5);

            return view('BackOffice.Depot-Center.index', compact('depotCenters'));
        }









        //front index

        public function show(Request $request)
        {
            // Prepare query
            $query = DepotCenter::query();
        
            // Search functionality (if needed)
            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('address', 'like', '%' . $request->search . '%');
            }
        
            // Paginate results (5 items per page)
            $depotCenters = $query->paginate(5);
        
            // Return the view with the depot centers
            return view('FrontOffice.Depot-Center.index', compact('depotCenters'));
        }
        




        
    
    
    
    public function create()
    {
        return view('BackOffice.Depot-Center.create'); // Change recycling_centers to depot_centers
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'capacity' => 'required|numeric', // Added capacity validation
            'phoneNumber' => 'nullable|string',
            'manager_name' => 'nullable|string', // Added manager_name validation
            'opening_hours' => 'nullable|string', // Added opening_hours validation
            'closing_hours' => 'nullable|string', // Added closing_hours validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        DepotCenter::create($data); // Change RecyclingCenter to DepotCenter

        return redirect()->route('depot_centers.index')// Passing the correct variable
        ->with('success', 'Centre de dépôt créé avec succès.'); // Change to 'Centre de dépôt'
    }

    public function edit(DepotCenter $depotCenter) // Change RecyclingCenter to DepotCenter
    {
        return view('BackOffice.Depot-Center.edit', compact('depotCenter')); // Change recycling_centers to depot_centers
    }

    public function update(Request $request, DepotCenter $depotCenter) // Change RecyclingCenter to DepotCenter
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'capacity' => 'required|numeric', // Added capacity validation
            'phoneNumber' => 'nullable|string',
            'manager_name' => 'nullable|string', // Added manager_name validation
            'opening_hours' => 'nullable|string', // Added opening_hours validation
            'closing_hours' => 'nullable|string', // Added closing_hours validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($depotCenter->image && file_exists(public_path('images/' . $depotCenter->image))) {
                unlink(public_path('images/' . $depotCenter->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $depotCenter->update($data); // Change RecyclingCenter to DepotCenter

        return redirect()->route('depot_centers.index') // Change recycling_centers to depot_centers
            ->with('success', 'Centre de dépôt mis à jour avec succès.'); // Change to 'Centre de dépôt'
    }

    public function destroy(DepotCenter $depotCenter) // Change RecyclingCenter to DepotCenter
    {
        // Delete the associated image if it exists
        if ($depotCenter->image && file_exists(public_path('images/' . $depotCenter->image))) {
            unlink(public_path('images/' . $depotCenter->image));
        }

        $depotCenter->delete(); // Change RecyclingCenter to DepotCenter

        return redirect()->route('depot_centers.index') // Change recycling_centers to depot_centers
            ->with('success', 'Centre de dépôt supprimé avec succès.'); // Change to 'Centre de dépôt'
    }
}
