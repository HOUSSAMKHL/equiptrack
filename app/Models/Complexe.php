<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complexe extends Model
{
    use HasFactory;

    protected $table = 'complexes';
    public $timestamps = false;

    protected $fillable = [
        'nom_complexe',
        'id_DR',
    ];

    public function directionRegionale()
    {
        return $this->belongsTo(DirectionRegionale::class, 'id_DR');
    }
}
