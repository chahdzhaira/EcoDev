<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAgence;
use Illuminate\Http\Request;

class DeliveryAgenceController extends Controller
{
   public function index()
   {
       $agences = DeliveryAgence::all();  
       return view('BackOffice.DeliveryAgence.index', compact('agences'));  
   }



public function indexFrontend()
{
    $agences = DeliveryAgence::all();  
    return view('FrontOffice.deliveryagence.index', compact('agences'));  
}

public function showFrontend($id)
{
    $agence = DeliveryAgence::findOrFail($id);  
    return view('FrontOffice.deliveryagence.show', compact('agence'));
}







   public function create()
   {
       return view('BackOffice.DeliveryAgence.create');  
   }

   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required|string|max:255',
           'address' => 'required|string|max:255',
           'phoneNumber' => 'required|integer',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
           'opening_hours' => 'required',
           'closing_hours' => 'required',
       ]);

       if ($request->hasFile('image')) {

        $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images/agencies'), $imageName);
    
    $validated['image'] = 'images/agencies/' . $imageName; 
}

       DeliveryAgence::create($validated);

       return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison créée avec succès.');
   }

   public function show($id)
   {
       $agence = DeliveryAgence::findOrFail($id); 
       return view('BackOffice.DeliveryAgence.show', compact('agence'));  
   }

   public function edit($id)
   {
       $agence = DeliveryAgence::findOrFail($id); 
       return view('BackOffice.DeliveryAgence.edit', compact('agence')); 
   }


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phoneNumber' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048', 
        'opening_hours' => 'required',
        'closing_hours' => 'required',
    ]);

    $agence = DeliveryAgence::findOrFail($id);
    
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/agencies'), $imageName);
        
        $validated['image'] = 'images/agencies/' . $imageName;
    } else {
        $validated['image'] = $agence->image; 
    }

    $agence->update($validated);

    return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison mise à jour avec succès.');
}


   public function destroy($id)
   {
       $agence = DeliveryAgence::findOrFail($id);  
       $agence->delete();  

       return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison supprimée avec succès.');
   }
}
