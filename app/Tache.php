<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    //permet de passer les infos de la BDD au classe qui y hérite
    protected $table = 'tache';

    public $timestamps = false;
    protected $filiable = ['id','nom_tache','Description','date_creation','accomplissement'];
}
