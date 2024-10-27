<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Participation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request, $eventId)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:8',
        ]);
    
        // Récupérer l'événement
        $event = Event::findOrFail($eventId);
    
        // Vérifier si l'utilisateur a déjà une participation à cet événement
        $existingParticipation = Participation::where('event_id', $event->id)
            ->where('email', $validated['email'])
            ->where('name', $validated['name'])
            ->first();
    
        if ($existingParticipation) {
            return redirect()->back()->with('error', 'Vous avez déjà participé à cet événement.');
        }
    
        // Vérifier s'il reste de la place pour cet événement
        if ($event->participations()->count() >= $event->max_participants) {
            return redirect()->back()->with('error', 'Le nombre maximum de participants a été atteint.');
        }
    
        // Créer une nouvelle participation
        $participation = Participation::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'registration_date' => now(),
            'event_id' => $event->id,
            'user_id' =>  Auth::id(), 
        ]);
    
        // Décrémenter max_participants si nécessaire
        $event->decrement('max_participants');
    
        // Rediriger vers la vue de voucher avec l'événement et la participation
        return redirect()->route('participation.voucher', [
            'eventId' => $event->id, 
            'participationId' => $participation->id
        ])->with('success', 'Vous avez été inscrit avec succès à cet événement.');
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
    public function destroy($participationId)
    {
        // Récupérer la participation en utilisant l'ID fourni
        $participation = Participation::findOrFail($participationId);
    
        // Vérifier que l'utilisateur connecté est le propriétaire de la participation
        if ($participation->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas annuler cette participation.');
        }
    
        // Supprimer la participation
        $participation->delete();
    
        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Votre participation a été annulée avec succès.');
    }

    public function downloadVoucher($eventId, $participationId)
    {
        $event = Event::findOrFail($eventId);
        $participation = Participation::findOrFail($participationId);
    
        // Charger la vue du voucher dans le PDF
        $pdf = \PDF::loadView('FrontOffice.Event.voucher', compact('event', 'participation'));
    
        // Télécharger le PDF
        return $pdf->download('voucher_' . $event->id . '.pdf');
    }

    public function voucher($eventId, $participationId)
{
    // Récupérer l'événement et la participation
    $event = Event::findOrFail($eventId);
    $participation = Participation::findOrFail($participationId);

    // Afficher la vue du voucher
    return view('FrontOffice.Event.voucher', compact('event', 'participation'));
}
public function showUserParticipations($userId)
{
    $user = User::with('participations')->findOrFail($userId);
    return view('user.participations', compact('user'));
}
}