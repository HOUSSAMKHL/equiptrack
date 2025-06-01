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
    public function equipementTracable()
{
    return $this->hasMany(EquipementTracable::class, 'id_frequence');
}
public function effectuers()
    {
        return $this->hasMany(Effectuer::class, 'id_frequence');
    }
}