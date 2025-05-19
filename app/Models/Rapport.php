<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $table = 'rapports';

    protected $fillable = [
        'titre',
        'type',
        'date_de_generation',
        'statut',
        'id_user',
    ];

    protected $dates = ['date_de_generation'];

    /**
     * Relation avec l'utilisateur qui a généré le rapport
     */
    public function utilisateur()
    {
        return $this->belongsTo(utilisateur::class, 'id_user');
    }
}