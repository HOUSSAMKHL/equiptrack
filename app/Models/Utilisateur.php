<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; // ← AJOUTE CECI

class Utilisateur extends Model
{
    use HasApiTokens, HasFactory; // ← AJOUTE HasApiTokens ICI

    protected $table = 'utilisateurs';
    public $timestamps = false;

    protected $fillable = [
        'nom_user',
        'age',
        'telephone',
        'email',
        'adresse',
        'password',
        'id_roles',
        'id_DR',
        'id_complexe',
        'id_etablissement',
        'id_atelier',
        'status'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_roles');
    }

    public function directionRegionale()
    {
        return $this->belongsTo(DirectionRegionale::class, 'id_DR');
    }

    public function complexe()
    {
        return $this->belongsTo(Complexe::class, 'id_complexe');
    }

    public function efp()
    {
        return $this->belongsTo(Efp::class, 'id_etablissement');
    }

    public function ateliers()
{
    return $this->belongsToMany(Atelier::class, 'atelier_utilisateur');
}
}