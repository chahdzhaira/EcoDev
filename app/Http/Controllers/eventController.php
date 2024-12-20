<?php

namespace App\Http\Controllers;
use App\Models\Event ; 
use Illuminate\Http\Request;
use Carbon\Carbon;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Event::query();

        // Check if there's a search request
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        // Apply pagination after building the query
        $events = $query->paginate(4); // Paginer ici
        
        return view('BackOffice.Event.eventList', compact('events'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackOffice.Event.addEvent');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date_format:Y-m-d', 
            'location' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:2|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $validatedData['image'] = $validatedData['image'] ?? 'default.jpg';


    // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
        // Créer un nouvel événement
        Event::create($validatedData);
    
        // Rediriger avec succès
        return redirect()->route('events.index')->with('success', 'Événement ajouté avec succès.');
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
    return view('BackOffice.Event.eventEdit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date_format:Y-m-d', 
        'location' => 'required|string|max:255',
        'organizer' => 'required|string|max:255',
        'max_participants' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image optionnelle
    ]);

    $event = Event::findOrFail($id);
 // Handle image upload
 if ($request->hasFile('image')) {
    // Delete old image if exists
    if ($event->image) {
        \Storage::delete('images/' . $event->image);
    }
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $imageName);
    $validatedData['image'] = $imageName;
}

    $event->update($validatedData);

    return redirect()->route('events.index')->with('success', 'L\'événement a été mis à jour avec succès !');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('events.index')->with('success', 'L\'événement a été supprimé avec succès !');
    }
}

