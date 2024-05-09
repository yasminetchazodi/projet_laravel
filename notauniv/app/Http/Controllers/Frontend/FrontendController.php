<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class FrontendController extends Controller
{

    public function home(){
        return view('frontend.home');
    }

    public function liste(){
        $universities = University::all(); 

        return view('frontend.universities_liste',compact('universities'));
    }
    
    public function showun($id){
        $university = University::findOrFail($id);
        $universities = University::all(); // Assurez-vous de récupérer les universités ici
        return view('frontend.university_details', compact('university', 'universities'));
    }
    



public function storeco(Request $request, $universityId)
{
    // Valider les données du formulaire
    $request->validate([
        'content' => 'required|string',
        // Ajoutez ici d'autres règles de validation si nécessaire
    ]);

    // Créer un nouveau commentaire
    $comment = new Comment();
    $comment->content = $request->input('content');
    
    // Assigner l'identifiant de l'utilisateur au commentaire
    $comment->user_id = Auth::id(); // Assumant que vous utilisez le système d'authentification de Laravel

    // Trouver l'université associée
    $university = University::findOrFail($universityId);

    // Enregistrer le commentaire associé à l'université
    $university->comments()->save($comment);

    // Rediriger l'utilisateur vers la page de détails de l'université avec un message de succès
    return redirect()->route('showun', $universityId)->with('success', 'Commentaire ajouté avec succès.');
}


    public function createco($universityId)
    {
        // Récupérer les informations de l'université
        $university = University::findOrFail($universityId);

        // Passer les informations de l'université à la vue de création de commentaire
        return view('comments.create', compact('university'));
    }    


   

 public function ranking()
{
    $universities = University::leftJoin('ratings', 'universities.id', '=', 'ratings.university_id')
        ->select('universities.id', 'universities.name', DB::raw('COALESCE(AVG(ratings.score), 0) as average_score'))
        ->groupBy('universities.id', 'universities.name')
        ->orderBy('average_score', 'desc')
        ->get();

    return view('frontend.classement', compact('universities'));
}

   
    }
