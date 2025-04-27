<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom_user',
        'age',
        'telephone',
        'email',
        'adresse',
        'id_roles',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_roles');
    }
}
