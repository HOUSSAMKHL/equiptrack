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
    // Dans Rapport.php
public function directionRegionale()
{
    return $this->belongsTo(DirectionRegionale::class, 'id_DR');
}

public function complexe()
{
    return $this->belongsTo(Complexe::class, 'id_complexe');
}

public function etablissement()
{
    return $this->belongsTo(Efp::class, 'id_etablissement');
}

public function atelier()
{
    return $this->belongsTo(Atelier::class, 'id_atelier');
}
}