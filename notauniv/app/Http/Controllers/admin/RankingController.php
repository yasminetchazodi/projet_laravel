<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    public function rankingclass()
    {
        $universities = University::leftJoin('ratings', 'universities.id', '=', 'ratings.university_id')
            ->select('universities.id', 'universities.name', DB::raw('COALESCE(AVG(ratings.score), 0) as average_score'))
            ->groupBy('universities.id', 'universities.name')
            ->orderBy('average_score', 'desc')
            ->get();
    
        return view('ranking.ranking', compact('universities'));
    }
}

