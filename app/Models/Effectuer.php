<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Effectuer extends Model
{
    use HasFactory;

    protected $table = 'effectuer';

    protected $fillable = [
        'id_user',
        'id_exemplaire',
        'id_operation',
        'date_operation',
        'durée',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    
    public function equipementTracable()
    {
        return $this->belongsTo(EquipementTracable::class);
    }
    
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
    
}
