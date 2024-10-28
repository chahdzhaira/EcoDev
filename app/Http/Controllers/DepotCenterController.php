<?php

namespace App\Http\Controllers;

use App\Models\DepotCenter;
use Illuminate\Http\Request;
use Dompdf\Dompdf; // If using Dompdf
use Barryvdh\Snappy\Facades\SnappyPdf as PDF; // If using Snappy


class DepotCenterController extends Controller
{
    // Display a listing of depot centers
    public function index(Request $request)
    {
        $query = DepotCenter::query();
        
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%');
        }

        
 // Sorting functionality
 if ($request->has('sort_by') && in_array($request->sort_by, ['name', 'address', 'capacity', 'total_quantity_available'])) {
    $query->orderBy($request->sort_by, $request->sort_direction === 'desc' ? 'desc' : 'asc');
}



        $depotCenters = $query->paginate(5);

        return view('BackOffice.Depot-Center.index', compact('depotCenters'));
    }

    
    // Display a listing for the front-end
    public function userIndex(Request $request)
    {
        $query = DepotCenter::query();
        
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%');
        }

        $depotCenters = $query->paginate(5);

        return view('FrontOffice.depot-center.index', compact('depotCenters'));
    }

    // Show the form for creating a new depot center
    public function create()
    {
        return view('BackOffice.Depot-Center.create');
    }

    // Store a newly created depot center in storage
    public function store(Request $request)
    {
        $data = $this->validateDepotCenter($request);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request);
        }

        DepotCenter::create($data);

        return redirect()->route('depot_centers.index')
                         ->with('success', 'Centre de dépôt créé avec succès.');
    }

    // Show the form for editing the specified depot center
    public function edit(DepotCenter $depotCenter)
    {
        return view('BackOffice.Depot-Center.edit', compact('depotCenter'));
    }

    // Update the specified depot center in storage
    public function update(Request $request, DepotCenter $depotCenter)
    {
        $data = $this->validateDepotCenter($request, $depotCenter->id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $this->deleteImage($depotCenter->image);
            $data['image'] = $this->uploadImage($request);
        }

        $depotCenter->update($data);

        return redirect()->route('depot_centers.index')
                         ->with('success', 'Centre de dépôt mis à jour avec succès.');
    }

    // Remove the specified depot center from storage
    public function destroy(DepotCenter $depotCenter)
    {
        // Delete the associated image if it exists
        $this->deleteImage($depotCenter->image);

        $depotCenter->delete();

        return redirect()->route('depot_centers.index')
                         ->with('success', 'Centre de dépôt supprimé avec succès.');
    }

    // Private function to handle validation rules
    private function validateDepotCenter(Request $request, $id = null)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'capacity' => 'required|integer|min:1',
            //'total_quantity_available' => 'required|integer|min:0',
            'phoneNumber' => 'nullable|string|regex:/^[0-9]{8}$/',
            'manager_name' => 'nullable|string|max:255',
            'opening_hours' => 'required',
            'closing_hours' => 'required|after:opening_hours',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'address.required' => 'L\'adresse est obligatoire.',
            'capacity.required' => 'La capacité est obligatoire.',
            'phoneNumber.regex' => 'Le numéro de téléphone doit contenir 8 chiffres.',
            'closing_hours.after' => 'L\'heure de fermeture doit être après l\'heure d\'ouverture.',
        ]);
    }

    // Private function to handle image upload
    private function uploadImage(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        return $imageName;
    }

    // Private function to delete image if exists
    private function deleteImage($imageName)
    {
        if ($imageName && file_exists(public_path('images/' . $imageName))) {
            unlink(public_path('images/' . $imageName));
        }
    }


    // Private function to handle PDF upload
    public function downloadPdf(Request $request)
    {
        $depotCenters = DepotCenter::all(); // or apply your desired filtering
    
        // Load HTML content
        $html = view('BackOffice.Depot-Center.pdf', compact('depotCenters'))->render();
    
        // Instantiate Dompdf
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
    
        // (Optional) Setup the paper size and orientation
        $pdf->setPaper('A4', 'landscape');
    
        // Render the PDF
        $pdf->render();
    
        // Output the generated PDF to Browser
        return $pdf->stream('depot-centers.pdf', ['Attachment' => false]);
    }
    

    // Private function to delete PDF if exists
    private function deletePDF($pdfName)
    {
        if ($pdfName && file_exists(public_path('pdfs/' . $pdfName))) {
            unlink(public_path('pdfs/' . $pdfName));
        }
    }
    public function depotStatistics($depot)
{
    $statistics = Waste::select('category', \DB::raw('COUNT(*) as total'))
        ->whereHas('depot', function($query) use ($depot) {
            $query->where('name', $depot);
        })
        ->groupBy('category')
        ->get();

    return view('BackOffice.wastes.depot_statistics', compact('depot', 'statistics'));
}

}