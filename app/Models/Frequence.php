<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frequence extends Model
{
    use HasFactory;

    protected $table = 'frequences';
    public $timestamps = false;

    protected $fillable = [
        'type_frequence',
    ];
    public function equipementsIdentifies()
{
    return $this->hasMany(EquipementIdentifie::class, 'frequence_id');
}
}
