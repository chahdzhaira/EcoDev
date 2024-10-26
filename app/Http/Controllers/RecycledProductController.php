<?php

namespace App\Http\Controllers;
use App\Models\SalesCenter; // Import SalesCenter model
use App\Models\RecycledProduct; 
use Illuminate\Http\Request;
use PDF;

class RecycledProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $salesCenterId)
{
    // Retrieve the sales center
    $salesCenter = SalesCenter::findOrFail($salesCenterId);

    // Start building the query for recycled products
    $query = RecycledProduct::where('sales_center_id', $salesCenterId);

    // Search functionality
    if ($request->filled('searchQuery')) {
        $searchQuery = $request->input('searchQuery');
        $query->where(function ($q) use ($searchQuery) {
            $q->where('name', 'LIKE', "%{$searchQuery}%")
              ->orWhere('description', 'LIKE', "%{$searchQuery}%")
              ->orWhere('price', 'LIKE', "%{$searchQuery}%");
        });
    }

    // Sort functionality
    if ($request->filled('sortBy')) {
        $sortBy = $request->input('sortBy');
        // You might want to add validation to ensure that only allowed fields can be sorted
        $query->orderBy($sortBy);
    }

    // Paginate the results
    $recycledProducts = $query->paginate(4); // Adjust the number of items per page as needed

    // Determine the view based on the request path or other parameters
    $view = $request->is('front/sales-centers/*') 
        ? 'FrontOffice.RecycledProduct.index' 
        : 'BackOffice.RecycledProduct.index';

    // Pass the data to the appropriate view
    return view($view, [
        'salesCenter' => $salesCenter,
        'recycledProducts' => $recycledProducts,
    ]);
}

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($salesCenterId)
    {
        $salesCenter = SalesCenter::findOrFail($salesCenterId);
        return view('BackOffice.RecycledProduct.create', compact('salesCenter'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $salesCenterId)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:30|min:3',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional image validation
        ], [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 30 characters.',
            'name.min' => 'The product name must be at least 3 characters.',
            'description.string' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a float.',
            'price.min' => 'The price must be at least 1.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);
    
    
        // Create a new recycled product
        $recycledProduct = new RecycledProduct();
        $recycledProduct->name = $request->input('name');
        $recycledProduct->description = $request->input('description');
        $recycledProduct->quantity = $request->input('quantity');
        $recycledProduct->price = $request->input('price');
        $recycledProduct->sales_center_id = $salesCenterId; // Associate with the sales center
    
        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/recycled_products', 'public');
            $recycledProduct->image = $imagePath;
        }
    
        // Save the recycled product to the database
        $recycledProduct->save();
    
        // Redirect back to the recycled products index with a success message
        return redirect()->route('BackOffice.RecycledProduct.index', $salesCenterId)
            ->with('success', 'Recycled product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show($salesCenterId, $productId)
     {
         $salesCenter = SalesCenter::findOrFail($salesCenterId);
         $product = RecycledProduct::findOrFail($productId);
     
         // Check if the current route is for the front office
         if (request()->is('front/*')) {
             // Logic for front office
             return view('FrontOffice.recycledProduct.show', compact('salesCenter', 'product'));
         } else {
             // Logic for back office
             return view('BackOffice.recycledProduct.show', compact('salesCenter', 'product'));
         }
     }
     
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($salesCenterId, $recycledProductId)
    {
        // Retrieve the sales center and recycled product
        $salesCenter = SalesCenter::findOrFail($salesCenterId);
        $recycledProduct = RecycledProduct::where('sales_center_id', $salesCenterId)
                                          ->findOrFail($recycledProductId);
    
        // Pass the data to the edit view
        return view('BackOffice.RecycledProduct.edit', [
            'salesCenter' => $salesCenter,
            'recycledProduct' => $recycledProduct,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $salesCenterId, $recycledProductId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:30|min:3',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Optional image validation
        ], [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a string.',
            'name.max' => 'The product name may not be greater than 30 characters.',
            'name.min' => 'The product name must be at least 3 characters.',
            'description.string' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a float.',
            'price.min' => 'The price must be at least 1.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'image.max' => 'The image may not be greater than 2MB.',
        ]);
    
        // Retrieve the recycled product
        $recycledProduct = RecycledProduct::where('sales_center_id', $salesCenterId)
                                          ->findOrFail($recycledProductId);
        // Update the product fields
        $recycledProduct->name = $request->input('name');
        $recycledProduct->description = $request->input('description');
        $recycledProduct->quantity = $request->input('quantity');
        $recycledProduct->price = $request->input('price');
    
        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/recycled_products', 'public');
            $recycledProduct->image = $imagePath;
        }
    
        // Save the updated product
        $recycledProduct->save();
    
        // Redirect back to the recycled products index with a success message
        return redirect()->route('BackOffice.RecycledProduct.index', $salesCenterId)
            ->with('success', 'Recycled product updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($salesCenterId, $productId)
    {
        $product = RecycledProduct::where('sales_center_id', $salesCenterId)->findOrFail($productId);
        $product->delete();
    
        return redirect()->route('BackOffice.RecycledProduct.index', $salesCenterId)
                         ->with('success', 'Product deleted successfully.');
    }

    public function downloadPDF($salesCenterId)
{
    // Fetch recycled products for the specific sales center
    $recycledProducts = RecycledProduct::where('sales_center_id', $salesCenterId)->get();

  
    // Fetch the sales center information
    $salesCenter = SalesCenter::find($salesCenterId);

    // Generate the PDF
    $pdf = PDF::loadView('BackOffice.RecycledProduct.pdf', [
        'salesCenter' => $salesCenter,
        'recycledProducts' => $recycledProducts,
    ]);

    return $pdf->download('recycled_products.pdf');
}
public function showStatistics($salesCenterId)
{
    $recycledProducts = RecycledProduct::where('sales_center_id', $salesCenterId)->get();
    
    // Categorizing the products by price
    $lowPriceThreshold = 20; // Exemple de seuil pour bas prix
    $highPriceThreshold = 100; // Exemple de seuil pour haut prix

    $lowPrices = $recycledProducts->where('price', '<', $lowPriceThreshold)->count();
    $mediumPrices = $recycledProducts->where('price', '>=', $lowPriceThreshold)
                                     ->where('price', '<=', $highPriceThreshold)->count();
    $highPrices = $recycledProducts->where('price', '>', $highPriceThreshold)->count();

    return view('BackOffice.RecycledProduct.statistics', [
        'lowPrices' => $lowPrices,
        'mediumPrices' => $mediumPrices,
        'highPrices' => $highPrices,
        'salesCenter' => SalesCenter::find($salesCenterId),
    ]);
}


}
