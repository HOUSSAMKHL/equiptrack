<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    use HasFactory;

    protected $table = 'intervenants';
    public $timestamps = false; 

    protected $fillable = [
        'nom_intervenant',
        'numero',
        'societe',
    ];
}

