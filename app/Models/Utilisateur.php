<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Utilisateur extends Model
{
    use HasFactory;


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
        'id_DR', // Direction Régionale
        'id_complexe', // Complexe
        'id_etablissement', // EFP
        'id_atelier', // Atelier
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


    public function atelier()
    {
        return $this->belongsTo(Atelier::class, 'id_atelier');
    }
}