<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;


class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexun()
    {
        $universities= University::all();
        return view('Universities.index', ['universities'=>$universities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createun()
    {

              return view('Universities.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeun(Request $request)
    {
        {
        $university = new University();
        $university->name = $request->name;
        $university->description = $request->description;
        $university->location = $request->location;
        $university->save();
        
    
            // Rediriger avec un message de succès
            return redirect()->route('indexun')->with('success', 'Université ajoutée avec succès.');
        }
    }

    /**
     * Display the specified resource.
     */
    // public function showun(string $id)
    // {
    //     $university = University::findOrFail($id);
    //     return view('frontend.universities_liste', compact('university'));    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editun(string $id)
    {
        $university = University::findOrFail($id);
        return view('Universities.edit', compact('university'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateun(Request $request, $id)
    
{
    // Validation des données
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'location' => 'required',
    ]);

    // Récupérer l'université à mettre à jour depuis la base de données
    $university = University::findOrFail($id);

    // Mettre à jour les données de l'université
    $university->name = $request->name;
    $university->description = $request->description;
    $university->location = $request->location;
    $university->save();


        // Rediriger avec un message de succès
        return redirect()->route('indexun')->with('success', 'Informations de l\'université mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyun($id)
    {
        // Supprimer l'utilisateur de la base de données
        $university = University::findOrFail($id);
        $university->delete();

        // Rediriger avec un message de succès
        return redirect()->route('index')->with('success', 'Université supprimée avec succès.');
    }
}
