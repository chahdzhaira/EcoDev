<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\SpecialService;
use App\Models\DeliveryAgence;
use Illuminate\Http\Request;

class SpecialServiceController extends Controller
{

    // public function index($agencyId)
    // {
    //     $agency = DeliveryAgency::findOrFail($agencyId);
    //     $specialServices = SpecialService::where('delivery_agence_id', $agency->id)->paginate(4);
        
    //     return view('BackOffice.specialService.index', compact('specialServices', 'agency'));
    // }
    
    public function index(Request $request, $agencyId)
{
    $agency = DeliveryAgence::findOrFail($agencyId);

    $query = SpecialService::where('delivery_agence_id', $agencyId);

    // Fonctionnalité de recherche
    if ($request->has('search')) {
        $searchTerm = '%' . $request->search . '%';
        
        $query->where(function($query) use ($searchTerm) {
            $query->where('name', 'like', $searchTerm)
                  ->orWhere('additional_cost', 'like', $searchTerm)
                  ->orWhere('expiration_date', 'like', $searchTerm);
        });
    }

    // Fonctionnalité de tri
    if ($request->has('sort_by')) {
        if ($request->sort_by === 'name') {
            $query->orderBy('name', 'asc');
        } elseif ($request->sort_by === 'additional_cost') {
            $query->orderBy('additional_cost', 'asc');
        } elseif ($request->sort_by === 'expiration_date') {
            $query->orderBy('expiration_date', 'asc');
        }
    }
    $specialServices = $query->paginate(4)->appends($request->query());

    return view('BackOffice.deliveryagence.services', compact('specialServices', 'agency'));
}

    public function create($id)
    {
        $agency = DeliveryAgence::find($id);
        if (!$agency) {
            abort(404, "Agency not found");
        }
    
        return view('BackOffice.specialService.create', compact('agency'));
    }
    
    // public function store(Request $request, $agencyId)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'additional_cost' => 'required|numeric',
    //         'expiration_date' => 'required|date',
    //     ]);

    //     // Vérifier que l'agence existe
    //     $agency = DeliveryAgence::findOrFail($agencyId);

    //     $service = new SpecialService();
    //     $service->name = $request->name;
    //     $service->additional_cost = $request->additional_cost;
    //     $service->expiration_date = $request->expiration_date;
    //     $service->delivery_agence_id = $agencyId; // Assurez-vous que ce champ existe dans le modèle

    //     $service->save();

    //     return redirect()->route('delivery-agences.services', $agencyId)->with('success', 'Service added successfully!');
    // }


//     public function store(Request $request, $agencyId)
// {
//     $messages = [
//         'name.required' => 'The service name is required.',
//         'name.regex' => 'The service name should only contain letters.',
//         'name.unique' => 'The service name must be unique for this agency.',
//         'additional_cost.required' => 'The additional cost is required.',
//         'additional_cost.numeric' => 'The additional cost must be a number.',
//         'additional_cost.min' => 'The additional cost must be a positive value.',
//         'expiration_date.required' => 'The expiration date is required.',
//         'expiration_date.date' => 'The expiration date must be a valid date.',
//         'expiration_date.after' => 'The expiration date must be a future date.',
//     ];

//     $validator = Validator::make($request->all(), [
//         'name' => [
//             'required',
//             'string',
//             'regex:/^[a-zA-Z\s]+$/',
//             Rule::unique('special_services')->where(function ($query) use ($agencyId) {
//                 return $query->where('delivery_agence_id', $agencyId);
//             }),
//         ],
//         'additional_cost' => 'required|numeric|min:0', 
//         'expiration_date' => 'required|date|after:today', 
//     ], $messages);

//     if ($validator->fails()) {
//         return redirect()->back()
//             ->withErrors($validator)
//             ->withInput();
//     }

//     SpecialService::create([
//         'name' => $request->input('name'),
//         'additional_cost' => $request->input('additional_cost'),
//         'expiration_date' => $request->input('expiration_date'),
//         'delivery_agence_id' => $agencyId,
//     ]);

//     return redirect()->route('delivery-agences.services', $agencyId)
//         ->with('success', 'Special Service added successfully!');
// }


public function store(Request $request, $agencyId)
{
    $messages = [
        'name.required' => 'The service name is required.',
        'name.regex' => 'The service name can only contain letters.',
        'name.regex_no_numbers' => 'The service name cannot contain numbers.',
        'name.unique' => 'The service name must be unique for this agency.',
        'additional_cost.required' => 'The additional cost is required.',
        'additional_cost.numeric' => 'The additional cost must be a number.',
        'additional_cost.min' => 'The additional cost must be a positive value.',
        'expiration_date.required' => 'The expiration date is required.',
        'expiration_date.date' => 'The expiration date must be a valid date.',
        'expiration_date.after' => 'The expiration date must be a future date.',
    ];

    $validator = Validator::make($request->all(), [
        'name' => [
            'required',
            'string',
            'regex:/^[a-zA-Z\s]+$/', // Vérifie que le nom ne contient que des lettres et des espaces
            'regex:/^[^\d]*$/', // Vérifie que le nom ne contient pas de chiffres
            Rule::unique('special_services')->where(function ($query) use ($agencyId) {
                return $query->where('delivery_agence_id', $agencyId);
            }),
        ],
        'additional_cost' => 'required|numeric|min:0',
        'expiration_date' => 'required|date|after:today',
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    SpecialService::create([
        'name' => $request->input('name'),
        'additional_cost' => $request->input('additional_cost'),
        'expiration_date' => $request->input('expiration_date'),
        'delivery_agence_id' => $agencyId,
    ]);

    return redirect()->route('delivery-agences.services', $agencyId)
        ->with('success', 'Special service added successfully!');
}
//     public function update(Request $request, $agencyId, $id)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'additional_cost' => 'required|numeric',
//         'expiration_date' => 'required|date',
//     ]);

//     // Trouver le service spécial
//     $service = SpecialService::findOrFail($id);
    
//     // Mettre à jour les données
//     $service->update([
//         'name' => $request->name,
//         'additional_cost' => $request->additional_cost,
//         'expiration_date' => $request->expiration_date,
//         'delivery_agence_id' => $agencyId,
//     ]);

//     return redirect()->route('delivery-agences.services', $agencyId)->with('success', 'Service updated successfully!');
// }
public function edit($agencyId, $id)
{
    $service = SpecialService::findOrFail($id);
    $agency = DeliveryAgence::findOrFail($agencyId);
    
    return view('BackOffice.specialService.edit', compact('service', 'agency'));
}
public function update(Request $request, $agencyId, $id)
{
    $messages = [
        'name.required' => 'The service name is required.',
        'name.regex' => 'The service name should only contain letters.',
        'name.unique' => 'The service name must be unique for this agency.',
        'additional_cost.required' => 'The additional cost is required.',
        'additional_cost.numeric' => 'The additional cost must be a number.',
        'additional_cost.min' => 'The additional cost must be a positive value.',
        'expiration_date.required' => 'The expiration date is required.',
        'expiration_date.date' => 'The expiration date must be a valid date.',
        'expiration_date.after' => 'The expiration date must be a future date.',
    ];

    $validator = Validator::make($request->all(), [
        'name' => [
            'required',
            'string',
            'regex:/^[a-zA-Z\s]+$/',
            Rule::unique('special_services')->where(function ($query) use ($agencyId, $id) {
                return $query->where('delivery_agence_id', $agencyId)->where('id', '!=', $id); 
            }),
        ],
        'additional_cost' => 'required|numeric|min:0', 
        'expiration_date' => 'required|date|after:today', 
    ], $messages);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput(); // This ensures old input is retained
    }

    $service = SpecialService::findOrFail($id);
    $service->update([
        'name' => $request->input('name'),
        'additional_cost' => $request->input('additional_cost'),
        'expiration_date' => $request->input('expiration_date'),
    ]);

    return redirect()->route('delivery-agences.services', $agencyId)
        ->with('success', 'Special Service updated successfully!');
}


    public function destroy($agencyId, $id)
    {
        \Log::info("Attempting to delete special service with ID: {$id}");
        $service = SpecialService::findOrFail($id);
        $agencyId = $service->delivery_agence_id;
        $service->delete();
        \Log::info("Deleted special service with ID: {$id}");
    
        return redirect()->route('delivery-agences.services', $agencyId)->with('success', 'Service deleted successfully!');
    }
    
}
