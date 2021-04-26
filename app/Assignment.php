<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    //
    protected $table = "assignments"; //define el nombre de la table.
    protected $primaryKey = 'id_assignment';
    protected $fillable = ['id_user','id_category']; //defines los nombres de los campos a usar
}
