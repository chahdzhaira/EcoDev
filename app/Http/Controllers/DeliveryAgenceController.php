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
    // Validation des données avec des messages personnalisés
    $validator = Validator::make($request->all(), [
'name' => 'required|string|min:5|max:255|unique:delivery_agences,name|regex:/^[\p{L} ]+$/u',
        'address' => 'required|string|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/|max:255',
        'phoneNumber' => 'required|digits:8',
        'opening_hours' => 'required|date_format:H:i',
        'closing_hours' => 'required|date_format:H:i|after:opening_hours',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
    ], [
        'name.required' => 'The name field is required.',
        'name.min' => 'The name must be at least 5 characters long.',
        'name.regex' => 'The name may only contain letters and spaces.',
        'name.unique' => 'This agency name is already taken.',
        'address.required' => 'The address field is required.',
        'address.regex' => 'The address must contain both letters and numbers.',
        'phoneNumber.required' => 'The phone number field is required.',
        'phoneNumber.digits' => 'The phone number must contain exactly 8 digits.',
        'opening_hours.required' => 'The opening hours field is required.',
        'closing_hours.required' => 'The closing hours field is required.',
        'closing_hours.after' => 'Closing hours must be after opening hours.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, jfif.',
        'image.max' => 'The image may not be greater than 2MB.',
    ]);

    // Vérification des erreurs de validation
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Générer un nom unique pour l'image
            $imageName = time() . '.' . $request->image->extension();
            // Déplacer l'image vers le dossier public/images/agencies
            $request->image->move(public_path('images/agencies'), $imageName);
            // Stocker le chemin de l'image
            $validated['image'] = 'images/agencies/' . $imageName;
        } else {
            $validated['image'] = null; // Si aucune image n'est téléchargée
        }

        // Création de l'agence
        DeliveryAgence::create([
            'name' => $request->name,
            'address' => $request->address,
            'phoneNumber' => $request->phoneNumber,
            'opening_hours' => $request->opening_hours,
            'closing_hours' => $request->closing_hours,
            'image' => $validated['image'], // Stocker le chemin de l'image
        ]);

        return redirect()->route('delivery-agences.index')->with('success', 'Agency created successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
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

public function edit($id)
{
    $agence = DeliveryAgence::findOrFail($id);  // Trouve l'agence ou renvoie une erreur 404
    return view('BackOffice.DeliveryAgence.edit', compact('agence'));  // Affiche la vue du formulaire d'édition
}

public function update(Request $request, $id)
{
    // Debugging: Truncate seconds from the time fields
    $request->merge([
        'opening_hours' => date('H:i', strtotime($request->opening_hours)),
        'closing_hours' => date('H:i', strtotime($request->closing_hours)),
    ]);

    // Validation des données
    $validator = Validator::make($request->all(), [
'name' => 'required|string|min:5|max:255|unique:delivery_agences,name,' . $id . '|regex:/^[\p{L} ]+$/u',        'address' => 'required|string|regex:/^(?=.*[a-zA-Z])(?=.*[0-9]).+$/|max:255',
        'phoneNumber' => 'required|digits:8',
        'opening_hours' => 'required|date_format:H:i',
        'closing_hours' => 'required|date_format:H:i|after:opening_hours',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,jfif|max:2048', // Image est facultative
    ], [
        'name.required' => 'The name field is required.',
        'name.min' => 'The name must be at least 5 characters long.',
        'name.regex' => 'The name may only contain letters and spaces.',
        'name.unique' => 'This agency name is already taken.',
        'address.required' => 'The address field is required.',
        'address.regex' => 'The address must contain both letters and numbers.',
        'phoneNumber.required' => 'The phone number field is required.',
        'phoneNumber.digits' => 'The phone number must contain exactly 8 digits.',
        'opening_hours.required' => 'The opening hours field is required.',
        'closing_hours.required' => 'The closing hours field is required.',
        'closing_hours.after' => 'Closing hours must be after opening hours.',
        'image.image' => 'The file must be an image.',
        'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, jfif.',
        'image.max' => 'The image may not be greater than 2MB.',
    ]);

    // Vérification des erreurs de validation
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        $agence = DeliveryAgence::findOrFail($id);
        
        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Générer un nom unique pour l'image
            $imageName = time() . '.' . $request->image->extension();
            // Déplacer l'image vers le dossier public/images/agencies
            $request->image->move(public_path('images/agencies'), $imageName);
            // Mettre à jour le chemin de l'image
            $agence->image = 'images/agencies/' . $imageName;
        }

        // Mise à jour des autres champs
        $agence->name = $request->name;
        $agence->address = $request->address;
        $agence->phoneNumber = $request->phoneNumber;
        $agence->opening_hours = $request->opening_hours;
        $agence->closing_hours = $request->closing_hours;

        $agence->save(); // Sauvegarder les modifications

        return redirect()->route('delivery-agences.index')->with('success', 'Delivery agency updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

   public function destroy($id)
   {
       $agence = DeliveryAgence::findOrFail($id);  
       $agence->delete();  

       return redirect()->route('delivery-agences.index')->with('success', 'Agence de livraison supprimée avec succès.');
   }
}
