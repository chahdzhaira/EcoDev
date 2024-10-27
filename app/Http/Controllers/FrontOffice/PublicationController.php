<?php

namespace App\Http\Controllers\FrontOffice;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $publications = Publication::all(); 
        $perPage = 2; //2publication par page 
        $currentPage = $request->input('page', 1);
        $publications = Publication::paginate($perPage); 

        // Récupérer les 3 dernières publications
        $latestPublications = Publication::orderBy('created_at', 'desc')->take(3)->get();

        return view('FrontOffice.Publication.index', compact('publications', 'currentPage' , 'latestPublications'));
    }


    // public function latest() {
    //     // Récupérer les 3 dernières publications
    //     $latestPublications = Publication::orderBy('created_at', 'desc')->take(3)->get();
        
    //     return view('FrontOffice.Publication.index', compact('latestPublications'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publication = Publication::with('comments')->find($id);
        $latestPublications = Publication::orderBy('created_at', 'desc')->take(3)->get();
        $commentCount = $publication->comments()->count();
        return view('FrontOffice.Publication.publicationDetail', compact('publication', 'latestPublications' , 'commentCount'));
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
