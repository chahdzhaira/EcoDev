<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Participation;
use Illuminate\Http\Request;

class participationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($eventId)
    {
         // Récupérer l'événement en utilisant l'ID fourni
         $event = Event::findOrFail($eventId);

         // Afficher la vue pour créer une participation
         return view('FrontOffice.participation.create', compact('event')) ; 
   
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $eventId)
    {
       // Valider les données du formulaire
       $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    // Récupérer l'événement
    $event = Event::findOrFail($eventId);

    // Vérifier s'il reste de la place pour cet événement
    if ($event->participations()->count() >= $event->max_participants) {
        return redirect()->back()->with('error', 'Le nombre maximum de participants a été atteint.');
    }

    // Créer une nouvelle participation
    Participation::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'registration_date' => now(),
        'event_id' => $event->id,
    ]);

    // Optionnel : Décrémenter max_participants si nécessaire (ou l'ajuster selon votre logique)
    // Si vous souhaitez réellement modifier la capacité disponible (plutôt qu'un comptage dynamique)
    $event->decrement('max_participants');

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Vous avez été inscrit avec succès à cet événement.');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
