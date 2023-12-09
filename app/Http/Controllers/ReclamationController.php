<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Reclamation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if is authenticate
        if(!Auth::check() || (Auth::user()->isadmin==1) || (Auth::user()->isroot==1))
        return redirect()->back()->with("error","u are not the root");
        // voir liste des reclamation + la poussibilite de modifier et supprimer un reclmation
        $reclamations=Auth::user()->reclamations;
        // dd($clubs);
        return view("reclamation.index",["reclamations"=> $reclamations])->with('success','u have been add new reclamation');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      // if is authenticate
      if(!Auth::check() || (Auth::user()->isadmin==1) || (Auth::user()->isroot==1))
      return redirect()->back()->with("error","u are not the root");

        $clubs=Club::all();
        return view('reclamation.Addreclamation',['clubs'=>$clubs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if is authenticate
        if(!Auth::check() || (Auth::user()->isadmin==1) || (Auth::user()->isroot==1))
        return redirect()->back()->with("error","u are not the root");

        $request->validate([
            'CorpReclamation' => 'required',
            'title' => 'required',
            'club_id' => 'required',
    ]);
    $reclamation=new Reclamation();
    $reclamation->CorpReclamation=$request->input('CorpReclamation');
    $reclamation->title=$request->input('title');
    $reclamation->club_id=$request->input('club_id');
    $reclamation->adherant_id=Auth::user()->id;
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
        // if is authenticate
        if(!Auth::check() || (Auth::user()->isadmin==1) || (Auth::user()->isroot==1))
        return redirect()->back()->with("error","u are not the root");

        if(Reclamation::find($NumReclamation))
        return view("reclamation.UpdateReclamation",['Reclamation'=>Reclamation::find($NumReclamation )]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $reclamation)
    {
        // if is authenticate
        if(!Auth::check() || (Auth::user()->isadmin==1) || (Auth::user()->isroot==1))
        return redirect()->back()->with("error","u are not the root");

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
        // if is authenticate
        if(!Auth::check() || (Auth::user()->isadmin==1) || (Auth::user()->isroot==1))
        return redirect()->back()->with("error","u are not the root");
    
        $reclamation=Reclamation::find($id);
        $reclamation->delete();
        return redirect()->route('reclamation.index');
    }
}
