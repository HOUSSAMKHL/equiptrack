<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementIdentifie extends Model
{
    use HasFactory;

    protected $table = 'equipement_identifies';

    protected $fillable = [
        'nom_equipement',
        'secteur',
        'id_categorie',
        'id_frequence',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    public function frequence()
    {
        return $this->belongsTo(Frequence::class, 'id_frequence');
    }
}
