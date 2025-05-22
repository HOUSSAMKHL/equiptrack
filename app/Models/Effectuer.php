<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Effectuer extends Model
{
    use HasFactory;

    protected $table = 'effectuer';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_exemplaire',
        'id_operation',
        'date_operation',
        'durée',
        'statut',
    ];


    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class , 'id_user');
    }
    
    public function equipementTracable()
    {
        return $this->belongsTo(EquipementTracable::class , 'id_exemplaire');
    }
    
    public function operation()
    {
        return $this->belongsTo(Operation::class , 'id_operation');
    }
    
}
