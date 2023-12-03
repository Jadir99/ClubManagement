<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs=Club::all();
        return view("Club.index",['clubs'=>$clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Club.newClub');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'club_name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);
    
    $Club=new Club();
    $Club->name=$request->input('club_name');
    $Club->description=$request->input('description');
    $Club->image=$request->input('image');
    $Club->admin_id=Auth::user()->id;
    $Club->save();
    return redirect()->route('Club.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // afficher des reclmations of club
        $reclamations=Club::find($id)->reclamations;
        return view ('Club.showreclamations',['reclamations'=>$reclamations]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
