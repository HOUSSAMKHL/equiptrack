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
        'date_remise',
        'duree_panne',
        'cout_reparation',
        'anomalie_resolue',
        'pieces_rechange',
        'id_user',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_user');
    }
}

