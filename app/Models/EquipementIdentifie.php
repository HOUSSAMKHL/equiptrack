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
        'quantite', // Ajout de la colonne quantite
        'id_categorie',
        'id_etablissement', // Nouvelle relation
    ];


    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }


    public function efp()
    {
        return $this->belongsTo(Efp::class, 'id_etablissement');
    }
}