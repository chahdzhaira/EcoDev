<?php

namespace App\Http\Controllers;
use App\Models\Event ; 
use Illuminate\Http\Request;

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
    
        $events = $query->get();
    
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'max_participants' => 'required|integer',
            'image_url' => 'required|url',
        ]);
    
        Event::create($validatedData);
    
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
            'max_participants' => 'required|integer|min:1',
            'image_url' => 'required|url',
        ]);
    
        $event = Event::findOrFail($id);
        $event->update($request->all());
    
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
