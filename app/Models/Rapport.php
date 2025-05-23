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
        'date_de_generation',
        'statut',
        'id_user',
        'fichier_path', // Ajout du champ pour stocker le chemin du fichier
    ];

    protected $dates = ['date_de_generation'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_user');
    }
}