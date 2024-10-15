<?php

namespace App\Http\Controllers;

use App\Models\DepotCenter; 
use Illuminate\Http\Request;

class DepotCenterController extends Controller
{
    public function index(Request $request)
    {
        // Prepare query
        $query = DepotCenter::query(); 
    
        // Search functionality (if needed)
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%');
        }
    
    //     // Paginate results
    //     $depotCenters = $query->paginate(10); // 
    
    //     return view('BackOffice.Depot-Center.index', compact('depotCenters')); // 
    // }




            // Pagination des résultats (5 éléments par page)
            $depotCenters = $query->paginate(5);

            return view('BackOffice.Depot-Center.index', compact('depotCenters'));
        }









        //front index

        public function userIndex(Request $request)
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

            //$depotCenter = $depotCenters->first(); // ou utilisez une méthode spécifique pour obtenir un dépôt

        
            // Return the view with the depot centers
            return view('FrontOffice.depot-center.index', compact('depotCenters'));
            // return view('FrontOffice.depot-center.index', [
            //     'depotCenters' => $depotCenters,
            //     'depotCenter' => $depotCenter // Assurez-vous que ceci est défini
            // ]);
        }
        




        
    
    
    
    public function create()
    {
        return view('BackOffice.Depot-Center.create'); 
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

        DepotCenter::create($data); 

        return redirect()->route('depot_centers.index')
        ->with('success', 'Centre de dépôt créé avec succès.'); 
    }

    public function edit(DepotCenter $depotCenter) 
    {
        return view('BackOffice.Depot-Center.edit', compact('depotCenter')); 
    }

    public function update(Request $request, DepotCenter $depotCenter) 
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

        $depotCenter->update($data); 

        return redirect()->route('depot_centers.index') 
            ->with('success', 'Centre de dépôt mis à jour avec succès.'); 
    }

    public function destroy(DepotCenter $depotCenter) 
    {
        // Delete the associated image if it exists
        if ($depotCenter->image && file_exists(public_path('images/' . $depotCenter->image))) {
            unlink(public_path('images/' . $depotCenter->image));
        }

        $depotCenter->delete(); 

        return redirect()->route('depot_centers.index') 
            ->with('success', 'Centre de dépôt supprimé avec succès.'); 
    }
}
