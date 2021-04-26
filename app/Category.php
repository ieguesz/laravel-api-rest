<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories"; //define el nombre de la table.
    protected $primaryKey = 'id_category';
    protected $fillable = ['id_business','name_cate']; //defines los nombres de los campos a usar
}
