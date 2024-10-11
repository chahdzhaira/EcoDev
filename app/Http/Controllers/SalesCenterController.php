<?php

namespace App\Http\Controllers;

use App\Models\SalesCenter;
use Illuminate\Http\Request;

class SalesCenterController extends Controller
{
    /**
     * Display a listing of the sales centers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = SalesCenter::query();
    
        if ($request->has('searchQuery') && $request->searchQuery != '') {
            $searchTerm = $request->input('searchQuery');
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('address', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('phoneNumber', 'LIKE', "%{$searchTerm}%");
            });
        }
        // Handle sorting
        if ($request->has('sortBy')) {
            $sortField = $request->sortBy;
            if (in_array($sortField, ['name', 'address', 'phoneNumber', 'opening_hours'])) {
                $query->orderBy($sortField);
            }
        }
        // Paginate the results
        $salesCenters = $query->paginate(6);
    
        if ($request->is('front/*')) {
            return view('FrontOffice.salesCenters.index', compact('salesCenters'));
        } else {
            return view('BackOffice.salesCenters.index', compact('salesCenters'));
        }
    }
    

    /**
     * Show the form for creating a new sales center.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackOffice.salesCenters.create'); 
    }

    /**
     * Store a newly created sales center in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:30',
            'address' => 'required|string|max:30',
            'phoneNumber' => 'required|string|digits:8',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'opening_hours' => 'required|string|max:255',
            'closing_hours' => 'required|string|max:255',
        ]);

        try {
            // Handle the uploaded image
            $imagePath = $request->file('image')->store('images', 'public');

            // Create a new SalesCenter
            $salesCenter = new SalesCenter();
            $salesCenter->name = $request->name;
            $salesCenter->address = $request->address;
            $salesCenter->phoneNumber = $request->phoneNumber;
            $salesCenter->image = $imagePath;
            $salesCenter->opening_hours = $request->opening_hours;
            $salesCenter->closing_hours = $request->closing_hours;

            // Save to database
            $salesCenter->save();
            return redirect()->route('salesCenters.index')->with('success', 'Sales center created successfully.');
        } catch (\Exception $e) {
            // If there is an error, set an error message
            return redirect()->route('salesCenters.create')->with('error', 'Failed to create sales center: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified sales center.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($request->is('front/*')) {
            $salesCenter = SalesCenter::findOrFail($id);
            return view('FrontOffice.salesCenters.show', compact('salesCenter'));
        }else{
        $salesCenter = SalesCenter::findOrFail($id);
        return view('BackOffice.salesCenters.show', compact('salesCenter'));
        }
    }

    /**
     * Show the form for editing the specified sales center.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the sales center
        $salesCenter = SalesCenter::findOrFail($id);
        
        // Return the edit view with the sales center data
        return view('BackOffice.salesCenters.edit', compact('salesCenter'));
    }

    /**
     * Update the specified sales center in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:30',
            'address' => 'required|string|max:30',
            'phoneNumber' => 'required|string|digits:8', // Change to digits:8 for phoneNumber
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image is optional
            'opening_hours' => 'required|string|max:255',
            'closing_hours' => 'required|string|max:255',
        ]);

        // Find the sales center
        $salesCenter = SalesCenter::findOrFail($id);

        // Update the fields
        $salesCenter->name = $request->name;
        $salesCenter->address = $request->address;
        $salesCenter->phoneNumber = $request->phoneNumber;

        // Handle the new image if provided
        if ($request->hasFile('image')) {
            // Optionally, delete the old image from storage if needed
            if ($salesCenter->image) {
                \Storage::disk('public')->delete($salesCenter->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $salesCenter->image = $imagePath;
        }

        $salesCenter->opening_hours = $request->opening_hours;
        $salesCenter->closing_hours = $request->closing_hours;

        // Save the updated sales center
        $salesCenter->save();

        return redirect()->route('salesCenters.index')->with('success', 'Sales center updated successfully.');
    }

    /**
     * Remove the specified sales center from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the sales center
        $salesCenter = SalesCenter::findOrFail($id);

        // Optionally, delete the associated image from storage
        if ($salesCenter->image) {
            \Storage::disk('public')->delete($salesCenter->image);
        }

        // Delete the sales center
        $salesCenter->delete();

        return redirect()->route('salesCenters.index')->with('success', 'Sales center deleted successfully.');
    }
}
