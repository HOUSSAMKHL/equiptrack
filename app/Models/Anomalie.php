<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panne extends Model
{
    use HasFactory;

    protected $table = 'anomalies';

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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

