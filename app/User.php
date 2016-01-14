<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //orsqu'on cr�e un enregistrement avec  la m�thode create comme on l'a pr�vu ci-dessus il y a un risque au niveau de la s�curit�.
    // Dans le tableau transmis en param�tre on a normalement seulement les champs que l'on d�sire renseigner.
    // Mais si un petit malin envoie d'autres informations elles risquent fort de se propager jusqu'� la table.
    // Pour �viter cela on d�finit dans le mod�le les champs qui peuvent �tre mis � jour avec cette m�thode
    // (on parle de mise � jour de masse) dans la propri�t� $fillable
    protected $fillable = ['name', 'prenom','pseudo','email', 'password','tel','pays','date','genre','numpostal','nomville','nomrue','numerorue'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
