<?php

namespace App\Http\Controllers;

use App\Models\reclamtion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adehrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // voir liste des reclamation + la poussibilite de modifier et supprimer un reclmation
        $reclamations=Auth::user()->reclamations;
        // dd($reclamations);
        return view("adherant.index",["Reclamation"=> $reclamations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
