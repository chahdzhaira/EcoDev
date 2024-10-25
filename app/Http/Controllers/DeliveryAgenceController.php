<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\DeliveryAgence;
use Illuminate\Http\Request;
use App\Models\SpecialService;  

class DeliveryAgenceController extends Controller
{


public function index(Request $request)
{
    $query = DeliveryAgence::query();

    // Recherche
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%'); // Change 'name' par le champ que tu veux chercher
    }

    // Tri
    if ($request->filled('sort_by')) {
        $query->orderBy($request->sort_by, 'asc'); // Tri ascendant par défaut
    }

    // Pagination
    $agences = $query->paginate(4);

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

public function showServicesFront($agencyId)
{
    $agency = DeliveryAgence::findOrFail($agencyId);
    $specialServices = SpecialService::where('delivery_agence_id', $agencyId)->get();

    return view('FrontOffice.specialService.index', compact('specialServices', 'agency'));
}


public function showServices($id)
{
    $agency = DeliveryAgence::findOrFail($id);

    $specialServices = $agency->specialServices()->paginate(10);  

    return view('BackOffice.DeliveryAgence.services', compact('agency', 'specialServices'));
}



   public function create()
   {
       return view('BackOffice.DeliveryAgence.create');  
   }

//    public function store(Request $request)
//    {
//        $validated = $request->validate([
//            'name' => 'required|string|max:255',
//            'address' => 'required|string|max:255',
//            'phoneNumber' => 'required|integer',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
//            'opening_hours' => 'required',
//            'closing_hours' => 'required',
//        ]);

//        if ($request->hasFile('image')) {

//         $imageName = time() . '.' . $request->image->extension();
//     $request->image->move(public_path('images/agencies'), $imageName);
    
//     $validated['image'] = 'images/agencies/' . $imageName; 
// }

//        DeliveryAgence::create($validated);

//        return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison créée avec succès.');
//    }
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255|unique:delivery_agences,name',
        'address' => 'required|string|max:255',
        'phoneNumber' => 'required|string|regex:/^\d{8,}$/', // Assurez-vous que le numéro de téléphone est valide
        'opening_hours' => 'required|date_format:H:i',
        'closing_hours' => 'required|date_format:H:i|after:opening_hours',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image est optionnelle
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        $agency = DeliveryAgence::create([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'image' => $request->file('image') ? $request->file('image')->store('images') : null, // Gérer le stockage de l'image
        ]);

        return redirect()->route('delivery-agences.index')->with('success', 'Agence créée avec succès !');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
    }
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

//    public function update(Request $request, $id)
//    {
//        $validated = $request->validate([
//            'name' => [
//                'required',
//                'regex:/^[a-zA-Z\s]+$/',  // Accepte uniquement des lettres et des espaces
//                'max:255'
//            ],
//            'address' => [
//                'required',
//                'regex:/\d+.*[a-zA-Z]+|[a-zA-Z]+.*\d+/',  // Doit contenir des lettres et des chiffres
//                'max:255'
//            ],
//            'phoneNumber' => 'required|integer',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
//            'opening_hours' => 'required',
//            'closing_hours' => [
//                'required',
//                function ($attribute, $value, $fail) use ($request) {
//                    if (strtotime($value) <= strtotime($request->input('opening_hours'))) {
//                        $fail('L\'heure de fermeture doit être postérieure à l\'heure d\'ouverture.');
//                    }
//                },
//            ],
//        ]);
   
//        $agence = DeliveryAgence::findOrFail($id);
   
//        // Gestion de l'image
//        if ($request->hasFile('image')) {
//            $imageName = time() . '.' . $request->image->extension();
//            $request->image->move(public_path('images/agencies'), $imageName);
//            $validated['image'] = 'images/agencies/' . $imageName;
//        } else {
//            $validated['image'] = $agence->image;  // Conserver l'ancienne image si aucune nouvelle image n'est téléchargée
//        }
   
//        $agence->update($validated);
   
//        return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison mise à jour avec succès.');
public function update(Request $request, $id)
{
    // Define custom error messages
    $messages = [
        'name.required' => 'The name is required.',
        'name.string' => 'The name must be a string.',
        'name.max' => 'The name cannot exceed 255 characters.',
        'address.required' => 'The address is required.',
        'address.string' => 'The address must be a string.',
        'address.max' => 'The address cannot exceed 255 characters.',
        'phoneNumber.required' => 'The phone number is required.',
        'phoneNumber.integer' => 'The phone number must be an integer.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, jfif.',
        'image.max' => 'The image cannot exceed 2 MB.',
        'opening_hours.required' => 'Opening hours are required.',
        'closing_hours.required' => 'Closing hours are required.',
        'closing_hours.after' => 'Closing hours must be after opening hours.',
    ];

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phoneNumber' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048', 
        'opening_hours' => 'required',
        'closing_hours' => 'required|after:opening_hours',
    ], $messages);

    $agence = DeliveryAgence::findOrFail($id);
    
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/agencies'), $imageName);
        
        $validated['image'] = 'images/agencies/' . $imageName;
    } else {
        $validated['image'] = $agence->image; 
    }

    $agence->update($validated);


    return redirect()->route('delivery-agences.index')->with('success', 'Delivery agency updated successfully.');
}


   public function destroy($id)
   {
       $agence = DeliveryAgence::findOrFail($id);  
       $agence->delete();  

       return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison supprimée avec succès.');
   }
}
