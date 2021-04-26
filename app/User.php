<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
        //
    protected $table = "users"; //define el nombre de la table.
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_business','name_user']; //defines los nombres de los campos a usar
}
