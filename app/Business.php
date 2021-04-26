<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //
    protected $table = "business"; //define el nombre de la table.
    protected $primaryKey = 'id_business';
    protected $fillable = ['name_busi']; //defines los nombres de los campos a usar

}
