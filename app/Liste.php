<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class liste extends Model
{
    //permet de passer les infos de la BDD au classe qui y hérite
    protected $table = 'liste';
    public $timestamps = false;
    protected $filiable = ['id','nom_liste','id_users'];


}
