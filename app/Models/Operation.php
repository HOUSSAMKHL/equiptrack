<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $table = 'operations';
    public $timestamps = false;

    protected $fillable = [
        'nom_operation',
        'type',
        'equipement',
        'date',
        'duree',
        'intervenant',
        'statut',
    ];

    public function utilisateurs()
{
    return $this->belongsToMany(Utilisateur::class, 'effectuer', 'id_operation', 'id_user')
        ->withPivot(['id_exemplaire', 'date_operation', 'durée', 'statut']);
}

public function equipementTracables()
{
    return $this->belongsToMany(EquipementTracable::class, 'effectuer', 'id_operation', 'id_exemplaire')
        ->withPivot(['id_user', 'date_operation', 'durée', 'statut']);
}
}
