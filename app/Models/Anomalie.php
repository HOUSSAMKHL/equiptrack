<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anomalie extends Model
{
    use HasFactory;

    protected $table = 'anomalies';

    public $timestamps = false;

    protected $fillable = [
        'cause_anomalie',
        'action_corrective',
        'date_signalement',
        'priorite',
        'status',
        'date_remise',
        'duree_panne',
        'cout_reparation',
        'anomalie_resolue',
        'pieces_rechange',
        'id_user',
        'id_intervenant',
        'id_equipement'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_user');
    }
    public function intervenant()
    {
        return $this->belongsTo(intervenant::class, 'id_intervenant');
    }
    public function equipementTracable()
    {
        return $this->belongsTo(EquipementTracable::class, 'id_equipement');
    }

}

