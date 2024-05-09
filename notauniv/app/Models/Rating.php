<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';


   

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }


    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
    // Define relationships with other models if needed
}
