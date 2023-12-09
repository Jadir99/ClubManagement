<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclkamationAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamations=Reclamation::all();
        return response()->json(["reclamations"=>$reclamations],200);
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
            "CorpReclamation"=> "required",
            "title"=> "required",
        ]);
        $reclamtion=new Reclamation();
        $reclamtion->title=$request->title;
        $reclamtion->CorpReclamation=$request->CorpReclamation;
        $reclamtion->adherant_id = 11;
        $reclamtion->club_id = 13;
        $reclamtion->save();
        return response()->json(["message"=>"Success"],201);

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
        $reclamtion=Reclamation::findorfail($id);
        $reclamtion->title=$request->title;
        $reclamtion->CorpReclamation=$request->CorpReclamation;
        $reclamtion->update();
        return response()->json(["message"=> "success"],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
