<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexcr()
    {
        $criterias = Criteria::all();
        return view('criterias.index', compact('criterias'));
    }

   
    public function createcr()
    {
        // Votre logique pour afficher le formulaire de création ici
        return view('criterias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storecr(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Criteria::create($request->all());

        return redirect()->route('indexcr')->with('success', 'Critère ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function showcr(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editcr(string $id)
    {
        $criteria = Criteria::findOrFail($id);
        return view('Criterias.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatecr(Request $request, string $id)
    {
        // Validation des données
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);

    $criteria = Criteria::findOrFail($id);

    $criteria->name = $request->name;
    $criteria->description = $request->description;
    $criteria->save();


        // Rediriger avec un message de succès
        return redirect()->route('indexcr')->with('success', 'Informations du critère mis à jour avec succès.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroycr(string $id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->delete();

        // Rediriger avec un message de succès
        return redirect()->route('indexcr')->with('success', 'critère supprimé avec succès.');
    }





}
