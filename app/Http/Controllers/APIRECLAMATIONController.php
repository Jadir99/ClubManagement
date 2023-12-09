<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class APIRECLAMATIONController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // un initialisation des les donnees
        $reclamation=Reclamation::all();

        return response()->json($reclamation);// envoye les donnees saus form json :)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CorpReclamation' => 'required',
            'title' => 'required',
            'club_id' => 'required',
        ]);

        $reclamation=new Reclamation();
        $reclamation->title = $request->title;
        $reclamation->CorpReclamation = $request->CorpReclamation;
        $reclamation->club_id = $request->club_id;
        $reclamation->adherant_id = 1;
        $reclamation->save();

        return response()->json(["message" => "inserer avec success "],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // les attributs de changement 
        $reclamation =Reclamation::findorfail($id);
        $reclamation->title = $request->title;
        $reclamation->CorpReclamation = $request->CorpReclamation;
        $reclamation->update();
        return response()->json(["message"=>"success"],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
