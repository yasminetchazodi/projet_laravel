<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model

{

    protected $table = 'criteria'; // Nom de votre table

    protected $fillable = [
        'name', 'description',
    ];

    // Define relationships with other models if needed
}
