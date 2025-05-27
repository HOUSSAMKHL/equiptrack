<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Efp extends Model
{
    use HasFactory;


    protected $table = 'efps';
    public $timestamps = false;


    protected $fillable = [
        'nom_etablissement',
        'adresse',
        'numero',
        'email',
        'id_complexe',
    ];


    public function complexe()
    {
        return $this->belongsTo(Complexe::class, 'id_complexe');
    }


    public function ateliers()
    {
        return $this->hasMany(Atelier::class, 'id_etablissement');
    }


    public function equipementsIdentifies()
    {
        return $this->hasMany(EquipementIdentifie::class, 'id_etablissement');
    }
}