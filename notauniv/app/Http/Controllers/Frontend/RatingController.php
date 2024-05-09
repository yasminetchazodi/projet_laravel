<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\University;
use App\Models\Criteria;



class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexra()
    {
        $ratings = Rating::all();
        return view('ratings.index', compact('ratings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createra($universityId)
    {
        // Récupérez les informations de l'université (vous pouvez ajuster cela en fonction de votre modèle)
        $university = University::findOrFail($universityId);
    
        // Récupérez la liste des critères (vous pouvez ajuster cela en fonction de votre modèle)
        $criteriaList = Criteria::all();
    
        return view('ratings.create', compact('universityId', 'university', 'criteriaList'));
    }



 // RatingController.php

public function rating(Request $request, $universityId)
{
    // Validez les données du formulaire
    $request->validate([
        'score' => 'required|integer|min:1|max:5',
        'criteria_id' => 'required|exists:criteria,id', // Assurez-vous que le critère sélectionné existe dans la table des critères
    ]);

    // Créez une nouvelle note pour l'université
    $rating = new Rating();
    $rating->user_id = auth()->user()->id;
    $rating->university_id = $universityId;
    $rating->criteria_id = $request->input('criteria_id'); // Récupérez le critère sélectionné
    $rating->score = $request->input('score');
    $rating->save();

    // Redirigez l'utilisateur vers la page de détails de l'université
    return redirect()->route('showun', $universityId)->with('success', 'Note ajoutée avec succès.');
}


    
    public function updateRating(Request $request, $ratingId)
    {
        // Validez les données du formulaire (par exemple, nouvelle note)
        $request->validate([
            'new_score' => 'required|integer|min:1|max:5', // Exemple de validation
        ]);

        // Récupérez la note existante
        $rating = Rating::findOrFail($ratingId);

        // Mettez à jour la note
        $rating->score = $request->input('new_score');
        $rating->save();

        // Redirigez l'utilisateur vers la page de détails de l'université
        return redirect()->route('showun', $rating->university_id);
    }

 

 public function history()
    {
        // Récupérez les notations de l'utilisateur connecté
        $userRatings = Rating::where('user_id', auth()->user()->id)->get();

        return view('ratings.history', compact('userRatings'));
    }


    public function editra($ratingId)
    {
        // Récupérez la notation existante
        $rating = Rating::findOrFail($ratingId);

        // Chargez d'autres données nécessaires à votre formulaire d'édition, si nécessaire
        
        return view('ratings.edit', compact('rating'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destrora($ratingId)
    {
        // Récupérez la notation existante
        $rating = Rating::findOrFail($ratingId);

        // Supprimez la notation
        $rating->delete();

        // Redirigez l'utilisateur vers la page index des notations avec un message de succès
        return redirect()->route('ratings.index')->with('success', 'La notation a été supprimée avec succès.');
    }

}


