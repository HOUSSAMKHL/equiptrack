<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;



class Utilisateur extends Model
{
    use HasFactory , HasApiTokens;

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
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_roles');
    }
}
