<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectionRegionale extends Model
{
    use HasFactory;

    protected $table = 'direction_regionales';

    protected $fillable = [
        'Nom_DR',  // Remplace par le champ exact si nécessaire
    ];
}
