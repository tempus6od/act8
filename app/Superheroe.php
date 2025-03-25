<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superheroe extends Model
{
    use softDeletes;
    protected $fillable = ['nombre_real', 'nombre_herore', 'foto_url','Informacion_adicional']
}
