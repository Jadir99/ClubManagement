<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // voir liste des reclamation + la poussibilite de modifier et supprimer un reclmation
        $reclamations=Auth::user()->reclamations;
        // dd($reclamations);
        return view("reclamation.index",["reclamations"=> $reclamations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reclamation.Addreclamation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CorpReclamation' => 'required',
    ]);
    $reclamation=new Reclamation();
    $reclamation->CorpReclamation=$request->input('CorpReclamation');
    $reclamation->adherant_id=1;
    $reclamation->save();
    return redirect()->route('reclamation.index');
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
    public function edit(int $NumReclamation)
    {
        if(Reclamation::find($NumReclamation))
        return view("reclamation.UpdateReclamation",['Reclamation'=>Reclamation::find($NumReclamation )]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $reclamation)
    {
        if(Reclamation::find($reclamation)){
        $rec=Reclamation::find($reclamation);
        echo $rec->CorpReclamation=$request->input('CorpReclamation');
        $rec->update();
        return redirect()->route('reclamation.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reclamation=Reclamation::find($id);
        $reclamation->delete();
        return redirect()->route('reclamation.index');
    }
}
