<?php

namespace App\Http\Controllers;

use App\Models\RecyclingCenter;
use Illuminate\Http\Request;

class RecyclingCenterController extends Controller
{
    public function index(Request $request)
    {
        // Préparer la requête
        $query = RecyclingCenter::query();

        // Fonctionnalité de recherche
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%');
        }

        // Pagination des résultats (5 éléments par page)
        $recyclingCenters = $query->paginate(5);

        return view('BackOffice.recycling_centers.index', compact('recyclingCenters'));
    }

// Ajoutez cette méthode dans RecyclingCenterController

public function userIndex()
{
    // Récupérer tous les centres de recyclage
    $recyclingCenters = RecyclingCenter::all();

    // Retourner la vue avec les centres de recyclage
    return view('FrontOffice.recycling-centers.index', compact('recyclingCenters'));
}


    public function create()
    {
        return view('BackOffice.recycling_centers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'address' => 'required',
            'phoneNumber' => 'required',
            'email' => 'nullable|email|max:100',
            'manager_name' => 'nullable|string|max:100',
            'opening_hours' => 'required|date_format:H:i',
            'closing_hours' => 'required|date_format:H:i|after:opening_hours',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
    

        $data = $request->all();

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        RecyclingCenter::create($data);

        return redirect()->route('recycling_centers.index')
            ->with('success', 'Centre de recyclage créé avec succès.');
    }

    public function edit(RecyclingCenter $recyclingCenter)
    {
        return view('BackOffice.recycling_centers.edit', compact('recyclingCenter'));
    }

    public function update(Request $request, RecyclingCenter $recyclingCenter)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100',
            'address' => 'required|string|min:10|max:255',
            'phoneNumber' => 'required',
            'email' => 'nullable|email|max:100',
            'manager_name' => 'nullable|string|max:100',
            'opening_hours' => 'date_format:H:i',
            'closing_hours' => 'date_format:H:i|after:opening_hours',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        
        $data = $request->all();

        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($recyclingCenter->image && file_exists(public_path('images/' . $recyclingCenter->image))) {
                unlink(public_path('images/' . $recyclingCenter->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $recyclingCenter->update($data);

        return redirect()->route('recycling_centers.index')
            ->with('success', 'Centre de recyclage mis à jour avec succès.');
    }


    public function destroy(RecyclingCenter $recyclingCenter)
    {
        // Supprimer l'image associée si elle existe
        if ($recyclingCenter->image && file_exists(public_path('images/' . $recyclingCenter->image))) {
            unlink(public_path('images/' . $recyclingCenter->image));
        }

        $recyclingCenter->delete();

        return redirect()->route('recycling_centers.index')
            ->with('success', 'Centre de recyclage supprimé avec succès.');
    }
}
