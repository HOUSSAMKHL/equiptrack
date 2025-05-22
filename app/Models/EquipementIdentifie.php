<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementIdentifie extends Model
{
    use HasFactory;

    protected $table = 'equipement_identifies';
    public $timestamps = false;

    protected $fillable = [
        'nom_equipement',
        'secteur',
        'id_categorie',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}
