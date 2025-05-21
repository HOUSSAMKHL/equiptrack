<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementTracable extends Model
{
    use HasFactory;

    protected $table = 'equipement_tracables';
    public $timestamps = false;

    protected $fillable = [
        'statut',
        'reference',
        'annee_dacquisition',
        'valeur_dacquisition',
        'id_atelier',
        'id_equipement',
    ];

    public function atelier()
    {
        return $this->belongsTo(Atelier::class, 'id_atelier');
    }

    public function equipementIdentifie()
    {
        return $this->belongsTo(EquipementIdentifie::class, 'id_equipement');
    }
    public function utilisateurs()
{
    return $this->belongsToMany(Utilisateur::class, 'effectuer', 'id_exemplaire', 'id_user')
        ->withPivot(['id_operation', 'date_operation', 'durée', 'statut']);
}

public function operations()
{
    return $this->belongsToMany(Operation::class, 'effectuer', 'id_exemplaire', 'id_operation')
        ->withPivot(['id_user', 'date_operation', 'durée', 'statut']);
}
}

