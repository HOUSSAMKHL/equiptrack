<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atelier extends Model
{
    use HasFactory;

    protected $table = 'ateliers';

    protected $fillable = [
        'numero_atelier',
        'id_etablissement',
    ];

    public function efp()
    {
        return $this->belongsTo(Efp::class, 'id_etablissement');
    }
}
