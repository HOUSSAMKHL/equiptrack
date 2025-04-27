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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function exemplaire()
    {
        return $this->belongsTo(Exemplaire::class, 'id_exemplaire');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'id_operation');
    }
}
